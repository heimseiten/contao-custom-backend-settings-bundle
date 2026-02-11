document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector("#ctrl_title")) {
            document.querySelector("#ctrl_title").focus()
        }
        var btn = document.querySelector('button:has(img[alt="Oben einfügen"])')
        if (btn) {
          btn.closest("form").submit()
        } 
})
