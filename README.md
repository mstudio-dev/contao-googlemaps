# Contao Google Maps Bundle (Mstudio)

Contao 5.x Upgrade des bewährten dlh_googlemaps Extensions.

## Features

✅ **Mehrere Elementtypen**
- Marker mit InfoWindows
- Polylinien
- Polygone
- Kreise
- Rechtecke  
- KML-Overlay

✅ **Flexible Konfiguration**
- Verschiedene Kartentypen (Straße, Satellit, Hybrid, Terrain)
- Einstellbare Zoom-Level und Steuerungen
- Benutzerdefinierte Marker-Icons
- Styling für Linien und Flächen

✅ **Backend-Verwaltung**
- Eigene Tabelle `tl_dlh_googlemaps_elements`
- Einfaches Hinzufügen von Elementen zu Content-Elementen
- Child-Records für übersichtliche Verwaltung

## Installation

### 1. Via Composer

```bash
composer require mstudio/contao-googlemaps
```

### 2. Manuelle Installation

Kopiere den Ordner nach `/vendor/mstudio/contao-googlemaps/`

Dann:
```bash
composer dump-autoload
```

### 3. Datenbank aktualisieren

Öffne das Contao Install Tool und aktualisiere die Datenbank.

## Verwendung

### 1. Google Maps API-Key besorgen

1. Gehe zu https://console.cloud.google.com/
2. Erstelle/wähle ein Projekt
3. Aktiviere "Maps JavaScript API"
4. Erstelle einen API-Key

### 2. Content-Element einfügen

1. Füge ein Content-Element vom Typ **Google Map** ein
2. Konfiguriere die Karte:
   - **API-Key**: Dein Google Maps API-Schlüssel
   - **Kartengröße**: Breite und Höhe in Pixel
   - **Zoom**: 1-20 (Standard: 10)
   - **Kartentyp**: ROADMAP, SATELLITE, HYBRID, TERRAIN
   - **Zoom-Steuerung**: DEFAULT, SMALL, LARGE, NONE

### 3. Elemente hinzufügen

Klicke im Backend auf **Content** → **Google Maps** oder navigiere über das Content-Element zu den Karten-Elementen.

#### Marker hinzufügen

1. Neues Element vom Typ **MARKER**
2. **Titel**: Name des Markers
3. **Koordinaten**: Format `48.137154,11.576124`
4. **Info-Fenster**: HTML-Inhalt für Popup
5. Optional: Custom Icon hochladen

#### Polylinie/Polygon

1. Typ: **POLYLINE** oder **POLYGON**
2. **Koordinaten**: Eine Koordinate pro Zeile
   ```
   48.137154,11.576124
   48.138000,11.577000
   48.139000,11.576500
   ```
3. **Styling**: Linienfarbe, -stärke, Transparenz
4. Bei Polygon: Füllfarbe und -transparenz

#### Kreis

1. Typ: **CIRCLE**
2. **Koordinaten**: Mittelpunkt
3. **Radius**: In Metern
4. **Styling**: Linien- und Füllfarbe

#### Rechteck

1. Typ: **RECTANGLE**  
2. **Bounds**: `SW-Lat,SW-Lng,NO-Lat,NO-Lng`
3. **Styling**: Linien- und Füllfarbe

#### KML-Layer

1. Typ: **KML**
2. **URL**: Vollständige URL zur KML-Datei

## Migration von dlh_googlemaps

Dieses Bundle ist ein direktes Upgrade und nutzt die gleichen Datenbank-Tabellen wie das Original:
- `tl_dlh_googlemaps_elements`
- Felder in `tl_content`

**Bestehende Daten bleiben erhalten!**

### Migrations-Schritte:

1. Altes Bundle deinstallieren:
   ```bash
   composer remove delahaye/dlh_googlemaps
   ```

2. Neues Bundle installieren:
   ```bash
   composer require mstudio/contao-googlemaps
   ```

3. Cache leeren:
   ```bash
   vendor/bin/contao-console cache:clear
   ```

4. **Keine Datenbank-Migration nötig** - die Tabellen bleiben unverändert

## Koordinaten finden

### Google Maps
1. Öffne https://maps.google.com
2. Rechtsklick auf gewünschte Position
3. Klicke auf die Koordinaten → werden in Zwischenablage kopiert
4. Format: `48.137154, 11.576124`

### OpenStreetMap
1. Öffne https://www.openstreetmap.org
2. Rechtsklick auf Position → "Adresse anzeigen"
3. Koordinaten werden angezeigt

## Anpassungen

### Template überschreiben

Kopiere `ce_dlh_googlemaps.html5` in dein Template-Verzeichnis und passe es an.

### CSS-Styling

```css
#gmap_123 {
    border: 2px solid #ccc;
    border-radius: 8px;
}
```

### JavaScript-Events

Du kannst eigene Event-Listener hinzufügen, indem du das Template anpasst.

## Troubleshooting

### Karte wird nicht angezeigt
- Überprüfe den API-Key
- Prüfe die Browser-Konsole auf JavaScript-Fehler
- Stelle sicher, dass "Maps JavaScript API" aktiviert ist

### Marker erscheinen nicht
- Prüfe, ob Elemente als "veröffentlicht" markiert sind
- Koordinaten-Format überprüfen (Komma-getrennt, Punkt als Dezimaltrenner)

### InfoWindow wird nicht angezeigt
- Stelle sicher, dass Inhalt im Feld "Info-Fenster" eingetragen ist
- Prüfe HTML-Syntax im Info-Fenster

## Lizenz

LGPL-3.0-or-later

## Credits

Basierend auf der ursprünglichen Extension von de la Haye.
Upgrade für Contao 5.x durch Mstudio.

## Support

Bei Fragen oder Problemen erstelle ein Issue im Repository.
