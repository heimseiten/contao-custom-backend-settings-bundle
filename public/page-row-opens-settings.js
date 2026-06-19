/*!
 * Custom Backend Settings (heimseiten.de)
 * Click a page row to open the page settings.
 *
 * In the page tree (do=page) the page label is not a link; clicking the row only
 * toggles its checkbox. This makes a click on the row open the page settings -
 * exactly the "edit" operation (pencil, href do=page&act=edit&id=<id>). The
 * clickable row label shows a pointer cursor.
 *
 * It reuses the row's own edit link, so the generated URL always matches Contao's
 * (request token, permissions). Clicks on real links, buttons, inputs and the
 * operations column are left untouched.
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
        if (event.target.closest('a, button, input, label, .tl_right')) {
            return;
        }

        var row = event.target.closest(ROW);

        if (!row) {
            return;
        }

        // Own edit link (not the "show differences" / versions variant). querySelector
        // returns the row's own operation, which precedes any nested child page rows.
        var link = row.querySelector('a[href*="act=edit"]:not([href*="versions"])');

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
