<?php

declare(strict_types=1);

namespace Mstudio\ContaoGooglemapsBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\Image;
use Contao\StringUtil;

class ElementsListener
{
    #[AsCallback(table: 'tl_dlh_googlemaps_elements', target: 'config.onload')]
    public function checkPermission(): void
    {
        // Permission check kann hier implementiert werden
    }

    #[AsCallback(table: 'tl_dlh_googlemaps_elements', target: 'list.sorting.child_record')]
    public function listElement(array $row): string
    {
        $type = $GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['type_options'][$row['type']] ?? $row['type'];
        
        return sprintf(
            '<div class="tl_content_left">%s <span style="color:#999;padding-left:3px">[%s]</span></div>',
            $row['title'],
            $type
        );
    }
}
