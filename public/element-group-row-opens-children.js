/*!
 * Custom Backend Settings (heimseiten.de)
 * Click an element-group header to open its child elements.
 *
 * An element group (content element "element_group") shows a header row with the
 * "Elementgruppe" label and a read-only preview of its children. This makes a
 * click on that header open the group's child elements - exactly the "child
 * elements" operation (href do=article&id=<id>&table=tl_content&ptable=tl_content).
 *
 * Only element groups carry such a child link, so regular content elements are
 * never affected. Clicks on links, buttons, the operations column and the child
 * preview are left untouched.
 */
(function () {
    'use strict';

    document.addEventListener('click', function (event) {
        if (event.target.closest('a, button, input, label, .tl_content_right, .cte_preview')) {
            return;
        }

        var inside = event.target.closest('.tl_content > .inside');

        if (!inside) {
            return;
        }

        // Only element groups have a "child elements" link (ptable=tl_content).
        var link = inside.querySelector('a[href*="ptable=tl_content"]');

        if (link) {
            event.preventDefault();
            link.click();
        }
    });
})();
