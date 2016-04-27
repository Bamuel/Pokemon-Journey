var iimages = [];
iimages[0] = "bg%20afternoon.jpg";
iimages[1] = "bg%20night.jpg";
iimages[2] = "bg%20day.png";
for (var i = 2; i < 11; i++) {
    iimages.push("img" + i + ".gif");
}
var x = 0;

function changeImage() {
    document.getElementById('ad').src = iimages[x];
    document.getElementById('ad2').src = iimages[x];
    if (x < 1) {
        x += 1;
    } else {
        x = 0;
    }
}
setInterval(function () {
    changeImage();
}, 60000);