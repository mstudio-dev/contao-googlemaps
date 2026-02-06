<?php

declare(strict_types=1);

namespace Mstudio\ContaoGooglemapsBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\Database;
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(category: 'media')]
class GooglemapsController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        // Map-Einstellungen
        $size = StringUtil::deserialize($model->dlh_googlemap_size);
        
        $template->mapId = 'gmap_' . $model->id;
        $template->apiKey = $model->dlh_googlemap;
        $template->width = $size[0] ?? 600;
        $template->height = $size[1] ?? 400;
        $template->zoom = (int) $model->dlh_googlemap_zoom;
        $template->mapType = strtoupper($model->dlh_googlemap_maptype ?: 'ROADMAP');
        $template->zoomType = strtoupper($model->dlh_googlemap_zoomtype ?: 'DEFAULT');
        $template->mapUrl = $model->dlh_googlemap_url;
        
        // Elemente laden
        $elements = $this->getElements($model->id);
        $template->elements = $elements;
        $template->hasElements = !empty($elements);
        
        // Zentrum berechnen
        if (!empty($elements)) {
            $template->center = $this->calculateCenter($elements);
        }

        return $template->getResponse();
    }

    private function getElements(int $pid): array
    {
        $elements = [];
        $result = Database::getInstance()
            ->prepare("SELECT * FROM tl_dlh_googlemaps_elements WHERE pid=? AND published='1' ORDER BY sorting")
            ->execute($pid);

        while ($result->next()) {
            $element = [
                'type' => $result->type,
                'title' => $result->title,
                'clickable' => (bool) $result->clickable,
            ];

            switch ($result->type) {
                case 'MARKER':
                    $coords = $this->parseCoords($result->singleCoords);
                    $element['lat'] = $coords[0] ?? 0;
                    $element['lng'] = $coords[1] ?? 0;
                    $element['infoWindow'] = $result->infoWindow;
                    $element['draggable'] = (bool) $result->draggable;
                    
                    if ($result->iconImg) {
                        $icon = FilesModel::findByUuid($result->iconImg);
                        if ($icon !== null) {
                            $element['icon'] = $icon->path;
                        }
                    }
                    break;

                case 'POLYLINE':
                case 'POLYGON':
                    $element['path'] = $this->parseMultiCoords($result->multiCoords);
                    $element['strokeColor'] = '#' . $result->strokeColor;
                    $element['strokeWeight'] = (int) $result->strokeWeight;
                    $element['strokeOpacity'] = (float) $result->strokeOpacity;
                    
                    if ($result->type === 'POLYGON') {
                        $element['fillColor'] = '#' . $result->fillColor;
                        $element['fillOpacity'] = (float) $result->fillOpacity;
                    }
                    break;

                case 'CIRCLE':
                    $coords = $this->parseCoords($result->singleCoords);
                    $element['lat'] = $coords[0] ?? 0;
                    $element['lng'] = $coords[1] ?? 0;
                    $element['radius'] = (float) $result->radius;
                    $element['strokeColor'] = '#' . $result->strokeColor;
                    $element['strokeWeight'] = (int) $result->strokeWeight;
                    $element['strokeOpacity'] = (float) $result->strokeOpacity;
                    $element['fillColor'] = '#' . $result->fillColor;
                    $element['fillOpacity'] = (float) $result->fillOpacity;
                    break;

                case 'RECTANGLE':
                    $bounds = $this->parseBounds($result->bounds);
                    $element['bounds'] = $bounds;
                    $element['strokeColor'] = '#' . $result->strokeColor;
                    $element['strokeWeight'] = (int) $result->strokeWeight;
                    $element['strokeOpacity'] = (float) $result->strokeOpacity;
                    $element['fillColor'] = '#' . $result->fillColor;
                    $element['fillOpacity'] = (float) $result->fillOpacity;
                    break;

                case 'KML':
                    $element['url'] = $result->url;
                    break;
            }

            $elements[] = $element;
        }

        return $elements;
    }

    private function parseCoords(string $coords): array
    {
        $parts = explode(',', $coords);
        return [
            (float) trim($parts[0] ?? 0),
            (float) trim($parts[1] ?? 0),
        ];
    }

    private function parseMultiCoords(string $coords): array
    {
        $lines = explode("\n", $coords);
        $path = [];
        
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }
            
            $parts = explode(',', $line);
            $path[] = [
                'lat' => (float) trim($parts[0] ?? 0),
                'lng' => (float) trim($parts[1] ?? 0),
            ];
        }
        
        return $path;
    }

    private function parseBounds(string $bounds): array
    {
        $parts = explode(',', $bounds);
        return [
            'south' => (float) trim($parts[0] ?? 0),
            'west' => (float) trim($parts[1] ?? 0),
            'north' => (float) trim($parts[2] ?? 0),
            'east' => (float) trim($parts[3] ?? 0),
        ];
    }

    private function calculateCenter(array $elements): array
    {
        $lats = [];
        $lngs = [];

        foreach ($elements as $element) {
            if (isset($element['lat'], $element['lng'])) {
                $lats[] = $element['lat'];
                $lngs[] = $element['lng'];
            } elseif (isset($element['path'])) {
                foreach ($element['path'] as $point) {
                    $lats[] = $point['lat'];
                    $lngs[] = $point['lng'];
                }
            }
        }

        if (empty($lats)) {
            return ['lat' => 0, 'lng' => 0];
        }

        return [
            'lat' => array_sum($lats) / count($lats),
            'lng' => array_sum($lngs) / count($lngs),
        ];
    }
}
