/*!
 * Custom Backend Settings (heimseiten.de)
 * Click a page row to open the page settings.
 *
 * In the page tree (do=page) the page NAME is a link that filters the tree
 * (do=page&pn=<id>). This intercepts a click on the row label and opens the page
 * settings instead - exactly the "edit" operation (pencil, do=page&act=edit&id=<id>).
 * The clickable row label shows a pointer cursor.
 *
 * Kept untouched: the "open in a new window" preview icon, the operations column
 * and form controls. The listener runs in the capture phase and stops the event,
 * so the tree-filter link (and Turbo) never take over.
 */
(function () {
    'use strict';

    var ROW = 'li[data-contao--operations-menu-record-table-value="tl_page"]';

    function applyCursor() {
        document.querySelectorAll(ROW + ' .tl_left').forEach(function (left) {
            left.style.cursor = 'pointer';
        });
    }

    document.addEventListener('click', function (event) {
        // Operations column and form controls keep their behaviour.
        if (event.target.closest('button, input, label, .tl_right')) {
            return;
        }

        // Keep the "open in a new window" preview link.
        if (event.target.closest('a[target="_blank"], a[href*="/preview"]')) {
            return;
        }

        // Only act inside the label area of a page row (this also covers the page
        // name link, which we deliberately override from "filter tree" to "edit").
        var left = event.target.closest('.tl_left');

        if (!left) {
            return;
        }

        var row = left.closest(ROW);

        if (!row) {
            return;
        }

        // The row's own edit link (not the "show differences" / versions variant).
        var link = row.querySelector('a[href*="act=edit"]:not([href*="versions"])');

        if (link) {
            event.preventDefault();
            event.stopPropagation();
            link.click();
        }
    }, true);

    document.addEventListener('turbo:load', applyCursor);
    document.addEventListener('turbo:render', applyCursor);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyCursor);
    } else {
        applyCursor();
    }
})();
