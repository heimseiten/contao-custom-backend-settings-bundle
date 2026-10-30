/*!
 * Custom Backend Settings (heimseiten.de)
 * Click a content element header or its preview to open (edit) the element.
 *
 * Clicking the header row (".cte_type", with the type label) of a normal content
 * element opens it for editing - exactly the "edit" operation (pencil,
 * href do=article&id=<id>&table=tl_content&act=edit). The header shows a pointer
 * cursor. The preview area (".cte_preview") opens it as well, except for clicks on
 * links, buttons, form fields or while selecting text. This also works inside element
 * groups.
 *
 * Operation links are found by their CSS class (Contao adds the operation name,
 * e.g. "a.edit", "a.children"), not by their href: inside an element group every
 * operation link carries ptable=tl_content.
 *
 * Element groups are left to element-group-row-opens-children.js (they carry a
 * "child elements" link, a.children); here they are skipped, so the two
 * features can be enabled together without conflict. Clicks on links and buttons
 * (incl. the drag handle) are left untouched.
 */
(function () {
    'use strict';

    function isGroup(content) {
        return !!content.querySelector('.tl_content_right a.children[href*="ptable=tl_content"]');
    }

    function applyCursor() {
        document.querySelectorAll('.tl_content').forEach(function (content) {
            if (isGroup(content)) {
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

        if (!content || isGroup(content)) {
            return;
        }

        var link = content.querySelector('.tl_content_right a.edit');

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
