<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Content Element Palette
$GLOBALS['TL_DCA']['tl_content']['palettes']['dlh_googlemaps'] = 
    '{type_legend},type,headline;{googlemaps_legend},dlh_googlemap,dlh_googlemap_size,dlh_googlemap_zoom,dlh_googlemap_maptype,dlh_googlemap_zoomtype,dlh_googlemap_url;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// Fields
$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap_size'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'multiple' => true, 'size' => 2, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap_zoom'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 2, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "int(2) NOT NULL default 10",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap_maptype'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['ROADMAP', 'SATELLITE', 'HYBRID', 'TERRAIN'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default 'ROADMAP'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap_zoomtype'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options' => ['DEFAULT', 'SMALL', 'LARGE', 'NONE'],
    'eval' => ['tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default 'DEFAULT'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dlh_googlemap_url'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 255, 'rgxp' => 'url', 'tl_class' => 'w50 wizard'],
    'sql' => "varchar(255) NOT NULL default ''",
];
