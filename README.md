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

### Verhalten – pro Benutzer

*Benutzer ▸ Benutzer bearbeiten ▸ Legende „Custom Backend Settings (heimseiten.de): Verhalten"*

Ebenfalls **nur für den jeweiligen Backend-Benutzer**.

| Option | Wirkung |
| --- | --- |
| Erstes Element automatisch einfügen | Legt man in einer noch **leeren** sortierbaren Liste ein neues Element an (z. B. das erste Inhaltselement eines Artikels), zeigt Contao trotzdem die Positionsauswahl an – obwohl es nur eine mögliche Position gibt. Diese Option überspringt die Abfrage und fügt das Element automatisch ein. Sind bereits Elemente vorhanden, bleibt die Positionsauswahl unangetastet. |

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

<img width="1922" alt="Bildschirmfoto 2024-05-15 um 21 10 59" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/95e81a05-9bbe-421e-93e1-2f2f9abd48c2">
<img width="1913" alt="Bildschirmfoto 2024-05-15 um 21 11 47" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/e8ddcd5e-db86-4c94-8dbb-89b2ff976327">
