<?php

declare(strict_types=1);

// Legends
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['type_legend'] = 'Elementtyp';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['geocoord_legend'] = 'Koordinaten';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['info_legend'] = 'Info-Fenster';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['style_legend'] = 'Styling';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['url_legend'] = 'URL';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['expert_legend'] = 'Experten-Einstellungen';
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['publish_legend'] = 'Veröffentlichung';

// Fields
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['type'] = ['Typ', 'Wählen Sie den Elementtyp'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['title'] = ['Titel', 'Titel des Elements'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['singleCoords'] = ['Koordinaten', 'Format: Breitengrad,Längengrad (z.B. 48.137154,11.576124)'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['multiCoords'] = ['Koordinaten', 'Eine Koordinate pro Zeile im Format: Breitengrad,Längengrad'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['bounds'] = ['Bounds', 'Format: SW-Breitengrad,SW-Längengrad,NO-Breitengrad,NO-Längengrad'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['radius'] = ['Radius', 'Radius in Metern'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['url'] = ['KML URL', 'URL zur KML-Datei'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['infoWindow'] = ['Info-Fenster Inhalt', 'Wird beim Klick auf den Marker angezeigt'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['infoWindowAnchor'] = ['Info-Fenster Anker', 'Format: x,y'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['markerType'] = ['Marker-Typ', 'Standard oder Erweitert'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['iconSize'] = ['Icon-Größe', 'Format: Breite,Höhe'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['iconAnchor'] = ['Icon-Anker', 'Format: x,y'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['popupAnchor'] = ['Popup-Anker', 'Format: x,y'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['shadowSize'] = ['Schatten-Größe', 'Format: Breite,Höhe'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['shadowAnchor'] = ['Schatten-Anker', 'Format: x,y'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['imageSize'] = ['Bildgröße', 'Größe für Bilder in Info-Fenstern'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['clickable'] = ['Anklickbar', 'Element ist anklickbar'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['draggable'] = ['Verschiebbar', 'Marker kann verschoben werden'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['iconImg'] = ['Icon-Bild', 'Benutzerdefiniertes Marker-Icon'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['shadowImg'] = ['Schatten-Bild', 'Schatten für das Marker-Icon'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['strokeColor'] = ['Linienfarbe', 'Farbe der Linie (Hex ohne #)'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['strokeWeight'] = ['Linienstärke', 'Stärke der Linie in Pixel'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['strokeOpacity'] = ['Linientransparenz', 'Wert zwischen 0 (transparent) und 1 (undurchsichtig)'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['fillColor'] = ['Füllfarbe', 'Farbe der Füllung (Hex ohne #)'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['fillOpacity'] = ['Fülltransparenz', 'Wert zwischen 0 (transparent) und 1 (undurchsichtig)'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['published'] = ['Veröffentlicht', 'Element auf der Karte anzeigen'];

// Type options
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['type_options'] = [
    'MARKER' => 'Marker',
    'POLYLINE' => 'Polylinie',
    'POLYGON' => 'Polygon',
    'CIRCLE' => 'Kreis',
    'RECTANGLE' => 'Rechteck',
    'KML' => 'KML',
];

$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['markerType_options'] = [
    'STANDARD' => 'Standard',
    'ADVANCED' => 'Erweitert',
];

// Buttons
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['new'] = ['Neues Element', 'Ein neues Element erstellen'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['edit'] = ['Element bearbeiten', 'Element ID %s bearbeiten'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['copy'] = ['Element duplizieren', 'Element ID %s duplizieren'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['cut'] = ['Element verschieben', 'Element ID %s verschieben'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['delete'] = ['Element löschen', 'Element ID %s löschen'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['toggle'] = ['Element veröffentlichen/unveröffentlichen', 'Element ID %s veröffentlichen/unveröffentlichen'];
$GLOBALS['TL_LANG']['tl_dlh_googlemaps_elements']['show'] = ['Element anzeigen', 'Details des Elements ID %s anzeigen'];
