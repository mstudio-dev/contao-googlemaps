<?php

declare(strict_types=1);

use Mstudio\ContaoGooglemapsBundle\Controller\ContentElement\GooglemapsController;

// Backend module
$GLOBALS['BE_MOD']['content']['dlh_googlemaps'] = [
    'tables' => ['tl_dlh_googlemaps_elements'],
];

// Content element
$GLOBALS['TL_CTE']['media']['dlh_googlemaps'] = GooglemapsController::class;
