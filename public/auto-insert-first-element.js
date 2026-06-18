/*!
 * Custom Backend Settings (heimseiten.de)
 * Auto-insert the first element into an empty sortable list.
 *
 * In Contao a sortable list (e.g. the content elements of an article) shows a
 * "choose insert position" screen after clicking "New". When the list is still
 * empty there is only ONE possible position, so asking is pointless. This
 * script detects that exact situation and submits the single position
 * automatically, taking you straight to the edit form.
 *
 * It only acts when ALL of the following are true, so the editor never loses
 * control over the position of further elements:
 *   1. The clipboard/paste screen is active  -> ".header_clipboard" is present.
 *   2. We are creating (not cutting/copying)  -> a "act=create&mode=2" form
 *      (paste into the empty parent) exists.
 *   3. The parent is empty                    -> NO "act=create&mode=1" form
 *      (paste after an existing sibling) exists.
 *
 * Every selector/parameter used here is taken from the Contao core
 * (DC_Table::parentView(), DataContainerOperationsBuilder::addPasteButton(),
 * data_container/operations.html.twig), not guessed.
 *
 * The Contao 5 backend is a Turbo application, so DOMContentLoaded does not
 * fire on in-backend navigation; we listen for "turbo:load" as well.
 */
(function () {
    'use strict';

    // Matches the POST form of a create-paste position button.
    // mode=2 -> "paste at the top / into the parent", mode=1 -> "paste after a sibling".
    function createPasteForms(mode) {
        var pattern = new RegExp('[?&]act=create&(?:amp;)?mode=' + mode + '(?:&|$)');

        return Array.prototype.filter.call(
            document.querySelectorAll('form[action]'),
            function (form) {
                return pattern.test(form.action) || pattern.test(form.getAttribute('action') || '');
            }
        );
    }

    function autoInsertFirstElement() {
        // 1. Only on the "choose insert position" screen (clipboard is active).
        if (!document.querySelector('.header_clipboard')) {
            return;
        }

        // 3. Existing siblings -> let the editor pick the position.
        if (createPasteForms(1).length > 0) {
            return;
        }

        // 2. The single "insert into the empty parent" position.
        var forms = createPasteForms(2);

        if (forms.length === 0) {
            return;
        }

        var form = forms[0];

        // Guard against acting twice on the same rendered page.
        if (form.dataset.cbsAutoInserted) {
            return;
        }

        form.dataset.cbsAutoInserted = '1';

        // Click the submit button so Contao's data-action handlers (scroll
        // offset) and Turbo's form handling run, just like a real click.
        var button = form.querySelector('button[type="submit"], button:not([type])');

        if (button) {
            button.click();
        } else if (typeof form.requestSubmit === 'function') {
            form.requestSubmit();
        } else {
            form.submit();
        }
    }

    document.addEventListener('turbo:load', autoInsertFirstElement);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', autoInsertFirstElement);
    } else {
        autoInsertFirstElement();
    }
})();
