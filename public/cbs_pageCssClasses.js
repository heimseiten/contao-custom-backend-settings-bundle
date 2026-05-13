function cbsInitPageCssClasses() {
    function splitCssClasses() {
        document.querySelectorAll('.page_css').forEach(function (el) {
            var text = el.textContent.trim()
            if (!text) {
                el.closest('.page_css_wrapper')?.remove()
                return
            }
            if (el.dataset.processed) return
            el.outerHTML = text.split(/\s+/).map(function (c) {
                return '<span class="page_css" data-processed="1">' + c + '</span>'
            }).join(' ')
        })
        document.querySelectorAll('.page_css_wrapper').forEach(function (el) {
            el.style.display = ''
        })
    }

    splitCssClasses()

    var retryCount = 0
    function attachObserver() {
        var listing = document.getElementById('tl_listing')
        if (listing) {
            splitCssClasses()
            new MutationObserver(splitCssClasses)
                .observe(listing, { childList: true, subtree: true })
        } else if (retryCount++ < 30) {
            setTimeout(attachObserver, 200)
        }
    }
    attachObserver()
}

document.addEventListener('DOMContentLoaded', cbsInitPageCssClasses)
document.addEventListener('turbo:load', cbsInitPageCssClasses)
