var images = new Array();
images[0] = "bg%20afternoon.jpg";
images[1] = "bg%20night.jpg";
images[2] = "bg%20day.jpg";
for (var i = 2; i < 11; i++) {
    images.push("img" + i + ".gif");
}
var x = 0;

function changeImage() {
    document.getElementById('ad').src = images[x];
    if (x < 1) {
        x += 1;
    } else {
        x = 0;
    }
}
setInterval(function () {
    changeImage();
}, 60000);
