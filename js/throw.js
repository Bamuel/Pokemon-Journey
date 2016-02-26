var images = new Array();
images[0] = "battle/male1.png";
images[1] = "battle/male2.png";
images[2] = "battle/male3.png";
images[3] = "battle/male4.png";
images[4] = "battle/male5.png";
var x = 0;

function changeImage() {
    document.getElementById('throw').src = images[x];
    if (x < 4) {
        x += 1;
    } else {
        x = 4;
    }
}
setInterval(function () {
    changeImage();
}, 150);