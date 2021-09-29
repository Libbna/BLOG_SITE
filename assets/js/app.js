var state = false;

function toggle(){
    if(state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").style.color = "#31708f";
        state = false
    }
    else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").style.color = "#656464";

        state = true;
    }
}



