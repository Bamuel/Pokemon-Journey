<?php

$pokemon = glob("pokemonsprites/" . "*.gif"); // Gets all gifs in that folder
?>
<?php

$ip = "$_SERVER[REMOTE_ADDR]";
if($ip === "127.0.0.1"  || $ip === "58.172.56.231") { /*Only awesome people can have spacial field*/
    $field = array(
        'battle/spacial.jpg'
    );
}
else{
    $field = array(
        'battle/1.jpg',
        'battle/2.jpg',
        'battle/3.jpg',
        'battle/4.jpg'
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Phone  https://goo.gl/CvCEpm -->
    <meta name="theme-color" content="red"><!-- Chrome, Firefox OS and Opera -->
    <meta name="msapplication-navbutton-color" content="red"><!-- Windows Phone -->
    <meta name="apple-mobile-web-app-capable" content="yes"><!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="red"> <!-- iOS Safari -->
    <!-- Phone END -->
    <title>Battle</title>
    <link rel="stylesheet" href="css/battle.css">
</head>
<body oncontextmenu="return false"> <!-- Prevent from right click-->
<script>
    document.onkeydown = function (e) {
        if (e.keyCode === 116) {
            return false; //Prevent from F5
        }
        else if(event.ctrlKey && event.shiftKey && event.keyCode==73) {
            return false;  //Prevent from ctrl+shift+i
        }
        /*
         else if(event.ctrlKey && event.keyCode==85) {
         return false;  //Prevent from ctrl+u
         }
         */
        else if(event.keyCode==123){
            return false; //Prevent from F12
        }
    };
</script>
<img id="bg" src="<?php echo $field[rand(0, count($field) - 1)]; ?>">
<img id="pokemon" src="<?php echo $pokemon[rand(0, count($pokemon) - 1)]; ?>">
<div id="menu">
    <div>
        <button id="" onclick="window.close()">Fight</button>
        <button id="" onclick="window.close()">Throw Bait</button>
    </div>
    <div>
        <button id="" onclick="window.close()">Throw Pokeball</button>
        <button id="" onclick="window.close()">Run</button>
    </div>
</div>
</body>
</html>