/*!
 * Custom Backend Settings (heimseiten.de)
 * Click a page row to open the page settings.
 *
 * Clicking the empty label area of a page row opens the page settings - exactly
 * the "edit" operation (pencil, do=page&act=edit&id=<id>). The clickable area
 * shows a pointer cursor.
 *
 * The row's own interactive controls keep their native behaviour and are NOT
 * hijacked: the expand/collapse toggle arrow (contao--toggle-nodes), the page
 * name link that filters the tree (do=page&pn=<id>), the "open in a new window"
 * preview icon, the operations column and form controls. The listener runs in
 * the capture phase and stops the event only for the plain label area, so Turbo
 * never takes over there.
 */
(function () {
    'use strict';

    var ROW = 'li[data-contao--operations-menu-record-table-value="tl_page"]';

    function editLink(row) {
        // The row's own edit link (not the "show differences" / versions variant).
        return row.querySelector('a[href*="act=edit"]:not([href*="versions"])');
    }

    function applyCursor() {
        // Only rows that can actually be opened: in the article view (do=article) the
        // page rows have no edit link, so a pointer there would promise a link that isn't one.
        document.querySelectorAll(ROW).forEach(function (row) {
            var left = row.querySelector('.tl_left');
            if (left && editLink(row)) {
                left.style.cursor = 'pointer';
            }
        });
    }

    document.addEventListener('click', function (event) {
        // Operations column and form controls keep their behaviour.
        if (event.target.closest('button, input, label, .tl_right')) {
            return;
        }

        // Keep the tree-navigation controls: the expand/collapse toggle arrow
        // (a.foldable / contao--toggle-nodes) must keep toggling the node.
        if (event.target.closest('[data-action*="toggle-nodes"], a.foldable')) {
            return;
        }

        // Keep the page-name link that filters the tree (do=page&pn=<id>).
        if (event.target.closest('a[href*="&pn="], a[href*="?pn="]')) {
            return;
        }

        // Keep the "open in a new window" preview link.
        if (event.target.closest('a[target="_blank"], a[href*="/preview"]')) {
            return;
        }

        // Only act inside the label area of a page row.
        var left = event.target.closest('.tl_left');

        if (!left) {
            return;
        }

        var row = left.closest(ROW);

        if (!row) {
            return;
        }

        var link = editLink(row);

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
