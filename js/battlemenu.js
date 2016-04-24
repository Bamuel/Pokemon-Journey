function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogbox = document.getElementById('dialogbox');
        dialogbox.style.right = "1%";
        dialogbox.style.width = "40%";
        dialogbox.style.bottom = "5%";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Alert = new CustomAlert();

function fight() {
    Alert.render('Pikachu used thunderbolt!');
}
function pokeball() {

}
function run() {
    Alert.render('Got away safely!');
}
function bait() {

}