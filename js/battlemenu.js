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
    var oppdamage = Math.floor((Math.random() * 25) + 10);
    var damage = Math.floor((Math.random() * 15) + 10);
    var health = document.getElementById("healthbar").value;
    var opphealth = document.getElementById("opphealthbar").value;
    var oppoutput = opphealth - oppdamage;
    var output = health - damage;
    document.getElementById("opphealthbar").value = oppoutput;
    document.getElementById("opphealth").innerHTML = oppoutput;
    opppokemons = document.getElementById("opppokemons").innerHTML;
    setTimeout(function(){ document.getElementById("health").innerHTML = output; }, 2000);
    setTimeout(function(){ document.getElementById("healthbar").value = output; }, 2000);
    setTimeout(function(){ Alert.render( opppokemons + ' attacked Pikachu'); }, 1500);
    Alert.render('Pikachu used thunderbolt!');
    battlemusic.volume = 0.4;
    var fight = document.getElementById("thunderbolt");
    fight.volume = 1;
    fight.play();
    thunder.attack();
    setTimeout('battlemusic.volume = 1', 3000);
    setTimeout('thunder.done();', 1000);
    setTimeout('Alert.ok()', 1499);
    setTimeout('Alert.ok()', 3000);
    if (oppoutput < 0){
        alert('Pokemon Defeated');
        setTimeout('close()', 2000);
    }
    else if (output < 0){
        battlemusic.volume = 0;
        alert('Pikachu has fainted');
        setTimeout('close()', 2000);
    }
}
function pokeball() {
    battlemusic.volume = 0.4;
    var pokeball = document.getElementById("pokeball");
    pokeball.volume = 1;
    pokeball.play();
    setTimeout('close()', 3500);
}
function run() {
    var run = document.getElementById("run");
    battlemusic.volume = 0.4;
    run.volume = 1;
    run.play();
    Alert.render('Got away safely!');
    setTimeout('close()', 2000);
}
function bait() {
    var oppdamage = Math.floor((Math.random() * 25) + 10);
    var damage = Math.floor((Math.random() * 15) + 10);
    var health = document.getElementById("healthbar").value;
    var opphealth = document.getElementById("opphealthbar").value;
    var opppokemons = document.getElementById("opppokemons").innerHTML;
    var oppoutput = opphealth - oppdamage;
    var output = health - damage;
    setTimeout(function(){ document.getElementById("health").innerHTML = output; }, 2000);
    setTimeout(function(){ document.getElementById("healthbar").value = output; }, 2000);
    setTimeout(function(){ Alert.render( opppokemons + ' attacked Pikachu'); }, 1500);
    battlemusic.volume = 0.4;
    var bait = document.getElementById("bait");
    bait.volume = 1;
    bait.play();
    setTimeout('Alert.ok()', 1499);
    setTimeout('Alert.ok()', 3000);
    setTimeout('battlemusic.volume = 1', 3500);
}
function close(){
    battlemusic.volume = 0;
    parent.postMessage('close-me', '*');
}