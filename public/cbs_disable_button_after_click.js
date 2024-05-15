document.addEventListener("DOMContentLoaded", function(event) { 
    
    disable_button_after_click()

    function disable_button_after_click() {
        if ( document.querySelector('form.tl_edit_form') ) {
            document.querySelector('form.tl_edit_form').addEventListener('submit',function(e){
                document.querySelectorAll('form.tl_edit_form button').forEach( button => {
                    button.classList.add('submitted')
                })
            })
        }
    }

})