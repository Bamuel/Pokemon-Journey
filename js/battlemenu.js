var Alert = new CustomAlert();
function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogbox = document.getElementById('dialogbox');
        dialogbox.style.right = "1%";
        dialogbox.style.width = "500px";
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

var thunder = new CustomAlert5();
function CustomAlert5(){
    this.attack = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogbox = document.getElementById('thunder');
        dialogbox.style.display = "block";
    }
    this.done = function(){
        document.getElementById('thunder').style.display = "none";
    }
}
var battlemusic = document.getElementById("battlemusic")
function fight() {
    var damage = Math.floor((Math.random() * 25) + 15);
    var health = document.getElementById("opphealthbar").value;
    var output = health - damage;
    document.getElementById("opphealthbar").value = output;
    document.getElementById("opphealth").innerHTML = output;
    Alert.render('Pikachu used thunderbolt!');
    battlemusic.volume = 0.4;
    var fight = document.getElementById("thunderbolt");
    fight.volume = 1;
    fight.play();
    thunder.attack();
    setTimeout('battlemusic.volume = 1', 3500);
    setTimeout('thunder.done();', 3501);
    setTimeout('Alert.ok()', 3500);
    if (output < 0){
        alert('Pokemon Defeated');
        window.close();
    }
}
function pokeball() {
    battlemusic.volume = 0.4;
    var pokeball = document.getElementById("pokeball");
    pokeball.volume = 1;
    pokeball.play();
    setTimeout('Alert.ok()', 3500);
    setTimeout('window.close()', 3500);
}
function run() {
    var run = document.getElementById("run");
    battlemusic.volume = 0.4;
    run.volume = 1;
    run.play();
    Alert.render('Got away safely!');
    setTimeout('battlemusic.volume = 1', 2000);
    setTimeout('window.close()', 2000);
}
function bait() {
    battlemusic.volume = 0.4;
    var bait = document.getElementById("bait");
    bait.volume = 1;
    bait.play();
    setTimeout('battlemusic.volume = 1', 3500);
    setTimeout('Alert.ok()', 3500);
}
