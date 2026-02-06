# 🚀 Schnellstart: Contao Google Maps (Mstudio)

## Installation in 3 Schritten

### 1️⃣ Bundle installieren
```bash
# In dein Contao-Projekt-Verzeichnis kopieren
cp -r contao-googlemaps /pfad/zu/deinem/contao/vendor/mstudio/

# Autoloader aktualisieren
cd /pfad/zu/deinem/contao/
composer dump-autoload
```

### 2️⃣ Datenbank aktualisieren
- Öffne: `https://deine-domain.de/contao/install`
- Klicke auf "Datenbank aktualisieren"
- Tabelle `tl_dlh_googlemaps_elements` wird angelegt (falls nicht vorhanden)

### 3️⃣ Google Maps API-Key holen
1. Gehe zu: https://console.cloud.google.com/
2. Erstelle Projekt (oder wähle existierendes)
3. **APIs & Services** → **Library** → Suche **"Maps JavaScript API"** → **Aktivieren**
4. **Credentials** → **Create Credentials** → **API Key** → Kopieren!

## Erste Map erstellen

### Im Backend:

1. **Artikel öffnen** → Neues Element → **Google Map**

2. **Karten-Einstellungen:**
   ```
   API-Key: [Dein kopierter API-Key]
   Größe: 800 x 400
   Zoom: 12
   Kartentyp: ROADMAP
   ```

3. **Element speichern** → Dann auf das Listview-Icon klicken oder über **Content → Google Maps**

4. **Neues Element** → Typ: **MARKER**
   ```
   Titel: Mein Standort
   Koordinaten: 48.137154,11.576124
   Info-Fenster: <h3>Willkommen!</h3><p>Unser Büro</p>
   Veröffentlicht: ✅
   ```

5. **Speichern** → Frontend ansehen ✨

## Koordinaten finden (Google Maps)

1. Öffne https://maps.google.com
2. **Rechtsklick** auf gewünschte Position
3. Klicke auf die **Koordinaten** (werden kopiert!)
4. Einfügen im Format: `48.137154,11.576124`

## Migration von altem dlh_googlemaps

```bash
# Altes Paket entfernen
composer remove delahaye/dlh_googlemaps

# Neues Paket installieren
# [Bundle wie oben kopieren]
composer dump-autoload

# Cache leeren
vendor/bin/contao-console cache:clear
```

**Deine Daten bleiben erhalten!** ✅ Keine Migration nötig.

## Weitere Elementtypen

### Polylinie (z.B. Route zeichnen)
```
Typ: POLYLINE
Koordinaten:
48.137154,11.576124
48.138000,11.577000
48.139000,11.576500

Linienfarbe: FF0000 (Rot)
Linienstärke: 3
```

### Polygon (z.B. Gebiet markieren)
```
Typ: POLYGON
Koordinaten: [wie Polylinie]
Linienfarbe: 0000FF
Füllfarbe: 0000FF
Fülltransparenz: 0.3
```

### Kreis (z.B. Lieferradius)
```
Typ: CIRCLE
Koordinaten: 48.137154,11.576124
Radius: 5000 (in Metern = 5km)
Füllfarbe: 00FF00
```

## Häufige Probleme

### ❌ Karte zeigt nur graue Fläche
→ API-Key falsch oder "Maps JavaScript API" nicht aktiviert

### ❌ Marker werden nicht angezeigt
→ Element auf "Veröffentlicht" setzen!

### ❌ InfoWindow öffnet nicht
→ Prüfe, ob Inhalt im Feld "Info-Fenster" eingetragen ist

## Support

📖 Vollständige Doku: Siehe `README.md`
🐛 Probleme: Erstelle ein Issue im Repository
