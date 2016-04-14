<?php
$pokemon = glob("pokemonsprites/" . "*.gif"); // Gets all gifs in that folder
?>
<?php

$ip = "$_SERVER[REMOTE_ADDR]";
if($ip === "127.0.0.1"  || $ip === "58.172.56.231"  || $ip === "203.29.155.29") { /*Only awesome people can have spacial field*/
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
    <title>Battle</title>
    <link rel="stylesheet" href="css/battle.css">
    <link rel="stylesheet" href="animate.css">
</head>
<body oncontextmenu="return false"> <!-- Prevent from right click-->
<script src="js/disable.js"></script>
<img id="bg" src="<?php echo $field[rand(0, count($field) - 1)]; ?>">
<img id="pokemon" class="animated slideInLeft" src="<?php echo $pokemon[rand(0, count($pokemon) - 1)]; ?>">
<img id="urpokemon" class="animated slideInLeft" src="pikachu-f.gif">
<div id="menu" class="animated fadeInRight">
    <div>
        <button id="" onclick="window.close();">Fight</button>
        <button id="" onclick="window.close();">Throw Bait</button>
    </div>
    <div>
        <button id="" onclick="window.close();">Throw Pokeball</button>
        <button id="" onclick="window.close();">Run</button>
    </div>
</div>
</body>
</html>