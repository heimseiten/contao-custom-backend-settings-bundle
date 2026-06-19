# Contao Custom Backend Settings (heimseiten.de)

Praktische Backend-Erweiterungen für **Contao 5**: Komfort-Optionen pro
Backend-Benutzer (Erscheinungsbild, Verhalten, Funktionen), globale Funktionen in
den Systemeinstellungen und Frontend-Beschriftungen pro Seitenlayout.

Alle Optionen erscheinen unter Legenden mit dem Präfix
**„Custom Backend Settings (heimseiten.de)"**, damit jederzeit erkennbar ist,
woher sie stammen.

## Installation

```bash
composer require heimseiten/contao-custom-backend-settings-bundle
```

Anschließend einmal `vendor/bin/contao-console contao:migrate` ausführen (legt die
für die Layout-Felder genutzte `jsonData`-Spalte an). Alle anderen Felder sind
ebenfalls **Virtual Fields** – es werden keine eigenen Datenbankspalten angelegt.

## Funktionen

### Erscheinungsbild – pro Benutzer

*Benutzer ▸ Benutzer bearbeiten ▸ Legende „… : Erscheinungsbild"*

Diese Optionen wirken **nur für den jeweiligen Backend-Benutzer**.

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

*Benutzer ▸ Benutzer bearbeiten ▸ Legende „… : Verhalten"*

| Option | Wirkung |
| --- | --- |
| Erstes Element automatisch einfügen | Legt man in einer noch **leeren** sortierbaren Liste ein neues Element an (z. B. das erste Inhaltselement eines Artikels), überspringt diese Option die ansonsten überflüssige Positionsauswahl und fügt automatisch ein. Sind bereits Elemente vorhanden, bleibt die Positionsauswahl unangetastet. |
| Klick auf Artikel-Zeile öffnet die Inhaltselemente | Ein Klick auf die Zeile eines Artikels öffnet direkt dessen Inhaltselemente – wie der Button „Inhaltselemente bearbeiten". |
| Klick auf Elementgruppen-Kopf öffnet die Kindelemente | Ein Klick auf die Kopfzeile einer Elementgruppe öffnet direkt deren Kindelemente – wie der Button „Kindelemente". |

### Funktionen – pro Benutzer

*Benutzer ▸ Benutzer bearbeiten ▸ Legende „… : Funktionen"*

Jeder Redakteur entscheidet selbst – diese Schalter sind pro Benutzer.

| Option | Wirkung |
| --- | --- |
| Seite / Artikel / Nachricht / Event direkt veröffentlichen | Neu angelegte Elemente sind sofort veröffentlicht – spart den Extra-Klick. |
| Kopien ohne „(Kopie)"-Zusatz | Beim Kopieren wird kein „(Kopie)" an den Namen gehängt – gilt für **alle** Datensätze (Seiten, Artikel, News, Events …), nicht nur Seiten/Artikel. |
| Echtes Kopieren von Nachrichten / Events | Kopiert Nachrichten bzw. Events inkl. aller Details (Datum, Autor, Veröffentlichungsstatus …) statt eines leeren Datensatzes. |

### Funktionen – global

*System ▸ Einstellungen ▸ Legende „… : Funktionen"*

Diese Optionen gelten **für die gesamte Installation**.

| Option | Wirkung |
| --- | --- |
| Mitgliederfelder nicht verpflichtend | Macht Vorname, Nachname und Land in den Mitgliederdaten optional. |
| HTML in Formularfeldern erlauben | Erlaubt HTML in der Feldbezeichnung, z. B. einen Zeilenumbruch `<br>`. |
| Paragraf (p) / Fett (strong) im Feld „Überschrift" | Ergänzt zusätzliche Tag-Optionen im Überschriften-Inhaltselement. |
| Beim Anlegen von Seiten keinen Artikel erzeugen | Contao legt beim Erstellen einer Seite normalerweise automatisch einen leeren Artikel in der Hauptspalte an. Diese Option verhindert das. |

### Frontend-Beschriftungen – pro Layout

*Layout ▸ Layout bearbeiten ▸ Legende „… : Frontend-Beschriftungen"*

Überschreibt einzelne Standardtexte des Frontends **pro Seitenlayout**. Da ein
Layout ohnehin sprachspezifisch ist, ersetzt das die frühere globale
Deutsch/Englisch-Aufteilung.

| Feld | Überschreibt |
| --- | --- |
| „Weiterlesen"-Link | Den „Weiterlesen"-Text (`MSC.more`), z. B. in der News-Listenansicht. |
| Pagination „zurück" | Die Beschriftung des Zurück-Links in der Blätter-Navigation (`MSC.previous`). |
| Pagination „vor" | Die Beschriftung des Vor-Links in der Blätter-Navigation (`MSC.next`). |

> Gesetzt werden diese Texte im Frontend über den `getPageLayout`-Hook (klassische
> Layouts) bzw. das `LayoutEvent` (moderne Twig-Layouts), jeweils bevor die Module
> gerendert werden, die sie verwenden.

## Screenshots

<img width="1922" alt="Bildschirmfoto 2024-05-15 um 21 10 59" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/95e81a05-9bbe-421e-93e1-2f2f9abd48c2">
<img width="1913" alt="Bildschirmfoto 2024-05-15 um 21 11 47" src="https://github.com/heimseiten/contao-custom-backend-settings-bundle/assets/6552484/e8ddcd5e-db86-4c94-8dbb-89b2ff976327">
