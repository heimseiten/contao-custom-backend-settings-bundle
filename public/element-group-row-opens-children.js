/*!
 * Custom Backend Settings (heimseiten.de)
 * Click an element-group header or its preview to open its child elements.
 *
 * An element group shows a header row (".cte_type", with the "Elementgruppe"
 * label) and a read-only preview of its children. Clicking that header opens the
 * group's child elements - exactly the "child elements" operation
 * (href do=article&id=<id>&table=tl_content&ptable=tl_content). The header shows
 * a pointer cursor. The preview area (".cte_preview") opens them as well, except for
 * clicks on links, buttons, form fields or while selecting text. This works at every
 * nesting level.
 *
 * The link is found by its CSS class: Contao adds the operation name to every
 * operation link ("a.children", "a.edit"). The href alone is not enough - inside
 * an element group every operation link carries ptable=tl_content, so the edit
 * link of a nested group would be taken for its child link.
 *
 * Only element groups carry such a child link, so regular content elements are
 * never affected (those are handled by content-element-row-opens-element.js).
 * Clicks on links and buttons (incl. the drag handle) are left untouched.
 */
(function () {
    'use strict';

    function childrenLink(content) {
        return content.querySelector('.tl_content_right a.children[href*="ptable=tl_content"]');
    }

    function applyCursor() {
        document.querySelectorAll('.tl_content').forEach(function (content) {
            if (!childrenLink(content)) {
                return;
            }
            content.querySelectorAll('.cte_type, .cte_preview').forEach(function (bereich) {
                bereich.style.cursor = 'pointer';
            });
        });
    }

function istKlickziel(event) {
        // Links, Knöpfe, Formularfelder und aufklappbare Teile in der Vorschau behalten ihre eigene Funktion
        if (event.target.closest('a, button, input, label, select, textarea, summary, video, audio')) {
            return null;
        }
        // wer in der Vorschau Text markiert, will nichts öffnen
        var auswahl = window.getSelection ? String(window.getSelection()) : '';
        if (auswahl.trim() !== '') {
            return null;
        }
        return event.target.closest('.cte_type, .cte_preview');
    }

    document.addEventListener('click', function (event) {
        var header = istKlickziel(event);

        if (!header) {
            return;
        }

        var content = header.closest('.tl_content');

        if (!content) {
            return;
        }

        var link = childrenLink(content);

        if (link) {
            event.preventDefault();
            link.click();
        }
    });

    document.addEventListener('turbo:load', applyCursor);
    document.addEventListener('turbo:render', applyCursor);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyCursor);
    } else {
        applyCursor();
    }
})();
