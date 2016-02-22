var dd = 9;
var cnt = 0;
function chng() {

    var rotator = document.getElementById('rr');  // change to match image ID
    var imageDir = 'potagonist/';                          // change to match images folder


    var images = ['2.gif', '3.gif', '4.gif', '5.gif', '6.gif', '7.gif', '8.gif', '9.gif', '10.gif'];

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
