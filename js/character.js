var dd = 4;
var cnt = 0;
function chng() {

    var rotator = document.getElementById('rr');  // change to match image ID
    var imageDir = 'potagonist/';                          // change to match images folder



    cnt++;

    var len = images.length;
    if (cnt < dd) {
        rr.src = imageDir + images[cnt];
    }
    else if (cnt == len) {
        rr.src = imageDir + images[0];
        cnt = 0;
    }
}
