# Contao Custom Backend Settings (heimseiten.de)

Praktische Backend-Erweiterungen für **Contao 5**: zusätzliche Komfort-Optionen
pro Backend-Benutzer (Erscheinungsbild) sowie globale Funktionen und
Frontend-Beschriftungen in den Systemeinstellungen.

Alle Optionen erscheinen unter Legenden mit dem Präfix
**„Custom Backend Settings (heimseiten.de)"**, damit jederzeit erkennbar ist,
woher sie stammen.

## Installation

```bash
composer require heimseiten/contao-custom-backend-settings-bundle
```

## Funktionen

### Erscheinungsbild – pro Benutzer

*Benutzer ▸ Benutzer bearbeiten ▸ Legende „Custom Backend Settings (heimseiten.de): Erscheinungsbild"*

Diese Optionen wirken **nur für den jeweiligen Backend-Benutzer** – jeder richtet
sich sein eigenes Erscheinungsbild ein.

| Option | Wirkung |
| --- | --- |
| Feld „CSS-Klasse" verlängern | Verlängert das CSS-Klassen-Feld in Artikeln und Inhaltselementen, damit auch mehrere Klassen übersichtlich bleiben. |
| Feld „Optionen" verlängern | Verlängert das Optionen-Feld, z. B. beim Select-Menü in Formularen. |
| Felder des Inhaltselements „Tabelle" vergrößern | Vergrößert die Eingabefelder des Tabellen-Inhaltselements. |
| Gefilterten Seitenbaum hervorheben | Hebt den aktiven Filter im Seitenbaum optisch hervor. |
| Durchsuchten Seitenbaum hervorheben | Hebt Suchtreffer im Seitenbaum optisch hervor. |
| Vorschaubilder in der Dateiverwaltung vergrößern | Zeigt die Vorschaubilder mit 250 px Breite. |
| Links zum Filtern im Seitenbaum und in Dateien deaktivieren | Deaktiviert die Klickbarkeit der Seitennamen zum Filtern des Baums. |
| Eigene Backend-Datei laden | Lädt `backend.css` aus `/files/layout/css/` ins Backend (eigenes Backend-Styling). |
| Layout-Spalten in der Artikelliste ausblenden | Blendet die Layout-Spalten in der Artikelliste aus. |

### Funktionen – global

*System ▸ Einstellungen ▸ Legende „Custom Backend Settings (heimseiten.de): Funktionen"*

Diese Optionen gelten **für die gesamte Installation**.

| Option | Wirkung |
| --- | --- |
| Seite / Artikel / Nachricht / Event direkt veröffentlichen | Neu angelegte Elemente sind sofort veröffentlicht – spart den Extra-Klick. |
| Kopieren ohne „(Kopie)" anzuhängen | Beim Kopieren von Seiten oder Artikeln wird kein „(Kopie)" an den Namen gehängt. |
| Echtes Kopieren von News / Events | Kopiert Nachrichten bzw. Events inkl. aller Details (Datum, Veröffentlichungsstatus …) statt eines leeren Datensatzes. |
| Vorname, Nachname & Land nicht Pflichtfelder | Macht diese drei Felder in den Mitgliederdaten optional. |
| HTML in Formularfeldern erlauben | Erlaubt HTML in der Feldbezeichnung, z. B. einen Zeilenumbruch `<br>`. |
| Paragraf (p) / Fett (strong) im Feld „Überschrift" | Ergänzt zusätzliche Tag-Optionen im Überschriften-Inhaltselement. |

### Frontend-Beschriftungen – global

*System ▸ Einstellungen ▸ Legende „Custom Backend Settings (heimseiten.de): Frontend-Beschriftungen"*

Überschreibt einzelne Standardtexte des Frontends – getrennt nach Sprache
(Deutsch / Englisch, greift anhand der Seitensprache).

| Feld | Überschreibt |
| --- | --- |
| „Weiterlesen"-Link (DE/EN) | Den „Weiterlesen"-Text, z. B. in der News-Listenansicht. |
| Pagination „zurück" (DE/EN) | Die Beschriftung des Zurück-Links in der Blätter-Navigation (Pagination). |
| Pagination „vor" (DE/EN) | Die Beschriftung des Vor-Links in der Blätter-Navigation (Pagination). |

> Intern werden diese Texte über `$GLOBALS['TL_LANG']['MSC']` gesetzt
> (siehe `contao/languages/*/default.php`). Die gleiche Mechanik unterstützt
> bereits `firstLabel`, `lastLabel` und `newsOverview` – diese sind aktuell nur
> noch nicht als Backend-Felder freigeschaltet.

## Screenshots

<img width="1685" height="924" alt="Bildschirmfoto 2026-04-13 um 09 47 01" src="https://github.com/user-attachments/assets/50c3911c-2619-4d74-8580-2adbf771b259" />
<img width="1683" height="1139" alt="Bildschirmfoto 2026-04-13 um 09 42 55" src="https://github.com/user-attachments/assets/71400930-d12e-42a5-a2a6-6325f7955db3" />

<img width="1922" alt="Bildschirmfoto 2024-05-15 um 21 10 59" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/95e81a05-9bbe-421e-93e1-2f2f9abd48c2">
<img width="1913" alt="Bildschirmfoto 2024-05-15 um 21 11 47" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/e8ddcd5e-db86-4c94-8dbb-89b2ff976327">

<img width="1814" height="811" alt="Bildschirmfoto 2026-03-16 um 18 21 11" src="https://github.com/user-attachments/assets/37f8c6bb-8986-4f64-af9d-ed3442517ad8" />
<img width="1803" height="840" alt="Bildschirmfoto 2026-03-16 um 18 20 55" src="https://github.com/user-attachments/assets/dcab1210-85de-4ba3-9425-2a7ce0bb717d" />
