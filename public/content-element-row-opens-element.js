/*!
 * Custom Backend Settings (heimseiten.de)
 * Click a content element header to open (edit) the element.
 *
 * Clicking the header row (".cte_type", with the type label) of a normal content
 * element opens it for editing - exactly the "edit" operation (pencil,
 * href do=article&id=<id>&table=tl_content&act=edit). The header shows a pointer
 * cursor.
 *
 * Element groups are left to element-group-row-opens-children.js (they carry a
 * "child elements" link, ptable=tl_content); here they are skipped, so the two
 * features can be enabled together without conflict. Clicks on links and buttons
 * (incl. the drag handle) are left untouched.
 */
(function () {
    'use strict';

    function isGroup(content) {
        return !!content.querySelector('a[href*="ptable=tl_content"]');
    }

    function applyCursor() {
        document.querySelectorAll('.tl_content').forEach(function (content) {
            if (isGroup(content)) {
                return;
            }
            var header = content.querySelector('.cte_type');
            if (header) {
                header.style.cursor = 'pointer';
            }
        });
    }

    document.addEventListener('click', function (event) {
        if (event.target.closest('a, button, input, label')) {
            return;
        }

        var header = event.target.closest('.cte_type');

        if (!header) {
            return;
        }

        var content = header.closest('.tl_content');

        if (!content || isGroup(content)) {
            return;
        }

        var link = content.querySelector('a[href*="act=edit"]:not([href*="versions"]):not([href*="ptable"])');

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
