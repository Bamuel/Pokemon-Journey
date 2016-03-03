var theme = document.getElementById("thethemesong");

function playAudio() {
    theme.play();
}

function pauseAudio() {
    theme.pause();
}

var playMusic = true;
$(document).keydown(function(e) {
    if(e.which == 77 || e.keyCode == 77) {
        var audio = document.getElementById("thethemesong");
        if(playMusic) {
            playMusic = false;
            audio.muted = true;
            return;
        }
        playMusic = true;
        audio.muted = false;
    }
});