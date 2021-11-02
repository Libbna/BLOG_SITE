// <!-- for website translation -->
function set_lang() {
    let language = $('#language').val();
    // if selected langauge is english
    if(language == "en") {
        document.cookie = "lang=en; path=/";
        window.location.reload();
        
    // if selected langauge is hindi
    } else if(language == "hi") {
        document.cookie = "lang=hi; path=/";
        window.location.reload();

    // if selected langauge is urdu
    } else if(language == "ur") {
        document.cookie = "lang=ur; path=/";
        window.location.reload();
        document.body.setAttribute('dir', 'rtl');

    } else {
        console.log("Invalid Selection");
    }
}

