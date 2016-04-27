var meetPokemon = Math.floor(Math.random() * 11) + 20;
function onClick() {
		
    steps += 1;
    document.getElementById("steps").innerHTML = steps;
		
		if(steps % meetPokemon == 0) {
			meetPokemon += Math.floor(Math.random() * 11 + 20);
			$("#ag").toggle(function() {
					$("#ag2").toggle();
			});
			
		}
}
$(function() {
	var bg1 = $("#ad");
	var bg2 = $("#ad2");
	var protag = $("#rr");
	$("#ag2").click(function() {
		$("#ag2").toggle(function() {
			$("#ag").toggle();
		});
	});
	$("#ag").click(function() {
		if(parseInt(protag.css("left")) < 400) {
			protag.css("left", (parseInt(protag.css("left")) + 12 + "px"));
			return;
		}
		
		if(parseInt(bg1.css("left")) <= -1349) {
			bg1.css("left", "1349px");
			return;
		} else if(parseInt(bg2.css("left")) <= -1349) {
			bg2.css("left", "1349px");
			return;
		}
		bg1.css("left", (parseInt(bg1.css("left")) - 10 + "px"));
		bg2.css("left", (parseInt(bg2.css("left")) - 10 + "px"));
	});
});

var Alert = new CustomAlert2();
function CustomAlert2(){
	this.pop = function(dialog){
		var winW = window.innerWidth;
		var winH = window.innerHeight;
		var popup = document.getElementById('popup');
		popup.style.display = "block"
		document.getElementById('popup').innerHTML = dialog + '<br> <button onclick="Alert.done()" id=done>Done</button>';
	}
	this.done = function(){
		document.getElementById('popup').style.display = "none";
	}
}
var trainerid = new trainerid1();
function trainerid1(){
	this.pop = function(dialog){
		var winW = window.innerWidth;
		var winH = window.innerHeight;
		var a = document.getElementById('trainercard');
		a.style.display = "block"
		var b = document.getElementById('leftside');
		b.style.display = "block"
		var c = document.getElementById('name');
		c.style.display = "block"
		var d = document.getElementById('gender');
		d.style.display = "block"
		var e = document.getElementById('class');
		e.style.display = "block"
		var f = document.getElementById('pokemonid');
		f.style.display = "block"
		var g = document.getElementById('rightside');
		g.style.display = "block"
		var h = document.getElementById('bottomside');
		h.style.display = "block"
		var i = document.getElementById('startdate');
		i.style.display = "block"
	}
	this.done = function(){
		document.getElementById('trainercard').style.display = "none";
		document.getElementById('leftside').style.display = "none";
		document.getElementById('name').style.display = "none";
		document.getElementById('gender').style.display = "none";
		document.getElementById('class').style.display = "none";
		document.getElementById('pokemonid').style.display = "none";
		document.getElementById('rightside').style.display = "none";
		document.getElementById('bottomside').style.display = "none";
		document.getElementById('startdate').style.display = "none";
	}
}