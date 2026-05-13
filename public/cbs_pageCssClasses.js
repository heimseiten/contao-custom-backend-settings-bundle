document.addEventListener('DOMContentLoaded', function () {
    function splitCssClasses() {
        document.querySelectorAll('.page_css').forEach(function (el) {
            var text = el.textContent.trim()
            if (!text) {
                el.closest('.page_css_wrapper')?.remove()
                return
            }
            if (el.dataset.processed) return
            el.dataset.processed = '1'
            el.outerHTML = text.split(/\s+/).map(function (c) {
                return '<span class="page_css">' + c + '</span>'
            }).join(' ')
        })
        document.querySelectorAll('.page_css_wrapper').forEach(function (el) {
            el.style.display = '';
        })
    }

    splitCssClasses()

    // Für Ajax-nachgeladene Äste im Seitenbaum
    new MutationObserver(splitCssClasses)
        .observe(document.getElementById('tl_listing'), { childList: true, subtree: true })
})