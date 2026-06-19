/*!
 * Custom Backend Settings (heimseiten.de)
 * Click an article row to open its content elements.
 *
 * In the article tree (do=article) the article label is not a link; clicking the
 * row only toggles its checkbox. This makes a click on the row open the article's
 * content elements - exactly the "edit article content" operation
 * (icon children.svg, href do=article&table=tl_content&id=<id>). The clickable
 * row label shows a pointer cursor.
 *
 * It reuses the row's own content link, so the generated URL always matches
 * Contao's (request token, permissions). Clicks on real links, buttons, inputs
 * and the operations column are left untouched.
 *
 * The Contao 5 backend is a Turbo app, so a single delegated click listener is
 * used and the cursor is (re)applied on each Turbo render.
 */
(function () {
    'use strict';

    var ROW = 'li.tl_file[data-contao--operations-menu-record-table-value="tl_article"]';

    function applyCursor() {
        document.querySelectorAll(ROW + ' .tl_left').forEach(function (left) {
            left.style.cursor = 'pointer';
        });
    }

    document.addEventListener('click', function (event) {
        // Leave links, buttons, form fields and the operations column alone.
        if (event.target.closest('a, button, input, label, .tl_right')) {
            return;
        }

        var row = event.target.closest(ROW);

        if (!row) {
            return;
        }

        var link = row.querySelector('a[href*="table=tl_content"]');

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
