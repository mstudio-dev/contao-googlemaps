# Changelog

## Version 2.0.0 (2026-02-06)

### Breaking Changes
- **Contao 5.x Upgrade**: Komplette Neustrukturierung für Contao 5.x
- Namespace geändert zu `Mstudio\ContaoGooglemapsBundle`
- PSR-4 Autoloading statt Legacy-Struktur
- Symfony Controller statt Legacy-Module/Elemente

### Added
- PHP 8.1+ Unterstützung
- Symfony 6.x Kompatibilität
- Typed Properties und Return Types
- #[AsContentElement] Attribute
- #[AsCallback] für DCA Callbacks
- Composer 2.x Support

### Changed
- Von Legacy-Modulen zu Symfony Controllern migriert
- DCA-Callbacks als Services mit Attributes
- Templates verwenden moderne Contao 5.x Blöcke
- Verbesserte Code-Qualität mit strict_types

### Removed
- Contao 3.x / 4.x Kompatibilität
- Legacy runonce.php
- Veraltete Hook-Registrierungen

### Migration
- Bestehende Daten in `tl_dlh_googlemaps_elements` bleiben kompatibel
- Keine Datenbankänderungen erforderlich
- Nur Composer-Paket austauschen

## Ältere Versionen (delahaye/dlh_googlemaps)

Siehe Original-Repository für Changelog der Versionen < 2.0.0
