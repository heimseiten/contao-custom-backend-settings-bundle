/*!
 * Custom Backend Settings (heimseiten.de)
 * Click an article row to open its content elements.
 *
 * In the article tree (do=article) the article label is not a link; clicking the
 * row only toggles its checkbox. This makes a click on the row open the article's
 * content elements - exactly the "edit article content" operation
 * (icon children.svg, href do=article&table=tl_content&id=<id>).
 *
 * It reuses the row's own content link, so the generated URL always matches
 * Contao's (request token, permissions). Clicks on real links, buttons, inputs
 * and the operations column are left untouched.
 *
 * The Contao 5 backend is a Turbo app, so a single delegated listener is used
 * (survives Turbo re-renders).
 */
(function () {
    'use strict';

    document.addEventListener('click', function (event) {
        // Leave links, buttons, form fields and the operations column alone.
        if (event.target.closest('a, button, input, label, .tl_right')) {
            return;
        }

        var row = event.target.closest('li.tl_file[data-contao--operations-menu-record-table-value="tl_article"]');

        if (!row) {
            return;
        }

        var link = row.querySelector('a[href*="table=tl_content"]');

        if (link) {
            event.preventDefault();
            link.click();
        }
    });
})();
