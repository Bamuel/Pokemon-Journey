document.onkeydown = function (e) {
    if (e.keyCode === 116) {
        return false; //Prevent from F5
    }
    else if(event.ctrlKey && event.shiftKey && event.keyCode==73) {
        return false;  //Prevent from ctrl+shift+i
    }
    else if(event.ctrlKey && event.keyCode==85) {
        return false;  //Prevent from ctrl+u
    }
    else if(event.keyCode==123){
        return false; //Prevent from F12
    }
};