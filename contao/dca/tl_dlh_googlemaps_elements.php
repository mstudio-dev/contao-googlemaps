<?php

declare(strict_types=1);

use Contao\DC_Table;
use Contao\DataContainer;
use Contao\Backend;
use Contao\Image;

$GLOBALS['TL_DCA']['tl_dlh_googlemaps_elements'] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'ptable' => 'tl_content',
        'enableVersioning' => true,
        'onload_callback' => [
            ['Mstudio\ContaoGooglemapsBundle\EventListener\DataContainer\ElementsListener', 'checkPermission'],
        ],
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid' => 'index',
            ],
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => DataContainer::MODE_PARENT,
            'fields' => ['sorting'],
            'headerFields' => ['type'],
            'panelLayout' => 'filter;search,limit',
            'child_record_callback' => ['Mstudio\ContaoGooglemapsBundle\EventListener\DataContainer\ElementsListener', 'listElement'],
        ],
        'global_operations' => [
            'all' => [
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],
            'copy' => [
                'href' => 'act=paste&amp;mode=copy',
                'icon' => 'copy.svg',
            ],
            'cut' => [
                'href' => 'act=paste&amp;mode=cut',
                'icon' => 'cut.svg',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? '') . '\'))return false;Backend.getScrollOffset()"',
            ],
            'toggle' => [
                'href' => 'act=toggle&amp;field=published',
                'icon' => 'visible.svg',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg',
            ],
        ],
    ],
    'palettes' => [
        '__selector__' => ['type'],
        'default' => '{type_legend},type',
        'MARKER' => '{type_legend},type,title;{geocoord_legend},singleCoords;{info_legend},infoWindow,infoWindowAnchor;{expert_legend:hide},markerType,iconSize,iconAnchor,popupAnchor,shadowSize,shadowAnchor,imageSize,clickable,draggable,iconImg,shadowImg;{publish_legend},published',
        'POLYLINE' => '{type_legend},type,title;{geocoord_legend},multiCoords;{style_legend},strokeColor,strokeWeight,strokeOpacity;{expert_legend:hide},clickable;{publish_legend},published',
        'POLYGON' => '{type_legend},type,title;{geocoord_legend},multiCoords;{style_legend},strokeColor,strokeWeight,strokeOpacity,fillColor,fillOpacity;{expert_legend:hide},clickable;{publish_legend},published',
        'CIRCLE' => '{type_legend},type,title;{geocoord_legend},singleCoords,radius;{style_legend},strokeColor,strokeWeight,strokeOpacity,fillColor,fillOpacity;{expert_legend:hide},clickable;{publish_legend},published',
        'RECTANGLE' => '{type_legend},type,title;{geocoord_legend},bounds;{style_legend},strokeColor,strokeWeight,strokeOpacity,fillColor,fillOpacity;{expert_legend:hide},clickable;{publish_legend},published',
        'KML' => '{type_legend},type,title;{url_legend},url;{publish_legend},published',
    ],
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'pid' => [
            'foreignKey' => 'tl_content.id',
            'sql' => "int(10) unsigned NOT NULL default 0",
            'relation' => ['type' => 'belongsTo', 'load' => 'lazy'],
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default 0",
        ],
        'sorting' => [
            'sql' => "int(10) unsigned NOT NULL default 0",
        ],
        'type' => [
            'exclude' => true,
            'filter' => true,
            'inputType' => 'select',
            'options' => ['MARKER', 'POLYLINE', 'POLYGON', 'CIRCLE', 'RECTANGLE', 'KML'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['type_options'],
            'eval' => ['mandatory' => true, 'submitOnChange' => true, 'tl_class' => 'w50'],
            'sql' => "varchar(32) NOT NULL default 'MARKER'",
        ],
        'title' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'singleCoords' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'multiCoords' => [
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => ['mandatory' => true, 'style' => 'height:60px', 'tl_class' => 'clr'],
            'sql' => "text NULL",
        ],
        'bounds' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 128, 'tl_class' => 'w50'],
            'sql' => "varchar(128) NOT NULL default ''",
        ],
        'radius' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 10, 'tl_class' => 'w50'],
            'sql' => "varchar(10) NOT NULL default ''",
        ],
        'url' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'infoWindow' => [
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => ['rte' => 'tinyMCE', 'tl_class' => 'clr'],
            'sql' => "text NULL",
        ],
        'infoWindowAnchor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'markerType' => [
            'exclude' => true,
            'inputType' => 'select',
            'options' => ['STANDARD', 'ADVANCED'],
            'reference' => &$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['markerType_options'],
            'eval' => ['tl_class' => 'w50'],
            'sql' => "varchar(32) NOT NULL default 'STANDARD'",
        ],
        'iconSize' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'iconAnchor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'popupAnchor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'shadowSize' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'shadowAnchor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 64, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'imageSize' => [
            'exclude' => true,
            'inputType' => 'imageSize',
            'options' => ['proportional', 'box'],
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
            'sql' => "varchar(128) NOT NULL default ''",
        ],
        'clickable' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default '1'",
        ],
        'draggable' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'iconImg' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'extensions' => 'jpg,jpeg,png,gif,svg', 'tl_class' => 'w50'],
            'sql' => "binary(16) NULL",
        ],
        'shadowImg' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'extensions' => 'jpg,jpeg,png,gif,svg', 'tl_class' => 'w50'],
            'sql' => "binary(16) NULL",
        ],
        'strokeColor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 6, 'colorpicker' => true, 'isHexColor' => true, 'decodeEntities' => true, 'tl_class' => 'w50 wizard'],
            'sql' => "varchar(6) NOT NULL default ''",
        ],
        'strokeWeight' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 10, 'tl_class' => 'w50'],
            'sql' => "varchar(10) NOT NULL default ''",
        ],
        'strokeOpacity' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 10, 'tl_class' => 'w50'],
            'sql' => "varchar(10) NOT NULL default ''",
        ],
        'fillColor' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 6, 'colorpicker' => true, 'isHexColor' => true, 'decodeEntities' => true, 'tl_class' => 'w50 wizard'],
            'sql' => "varchar(6) NOT NULL default ''",
        ],
        'fillOpacity' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 10, 'tl_class' => 'w50'],
            'sql' => "varchar(10) NOT NULL default ''",
        ],
        'published' => [
            'exclude' => true,
            'filter' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => "char(1) NOT NULL default ''",
        ],
    ],
];
