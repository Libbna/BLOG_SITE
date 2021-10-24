// <!-- for website translation -->
function set_lang() {
    let language = $('#language').val();
    // if selected langauge is english
    if(language == "en") {
        document.cookie = "lang=en; path=/";
        // Cookies.set("lang", "en");
        window.location.reload();
        
    // if selected langauge is hindi
    } else if(language == "hi") {
        document.cookie = "lang=hi; path=/";
        // Cookies.set("lang", "hi");

        window.location.reload();
    } else {
        console.log("Invalid Selection");
    }
}
