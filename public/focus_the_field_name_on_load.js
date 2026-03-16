document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector("#ctrl_type")) {
            document.querySelector("#ctrl_type").focus()
        }
        var btn = document.querySelector('button:has(img[alt="Oben einfügen"])')
        if (btn) {
          btn.closest("form").submit()
        } 
})
