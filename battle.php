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
$opp=$pokemon[rand(0, count($pokemon) - 1)];
$opp1 = str_replace('pokemonsprites/', '', $opp);
$opp2 = str_replace('.gif', '', $opp1);
$opp3 = str_replace('-1', '', $opp2);
$opp4 = str_replace('-2', '', $opp3);
$opp5 = str_replace('-3', '', $opp4);
$opp6 = str_replace('-4', '', $opp5);
$opp7 = str_replace('-5', '', $opp6);
$opp8 = str_replace('-mega', '', $opp7);
$opp9 = str_replace('-megax', '', $opp8);
$opp10 = str_replace('-megay', '', $opp9);
$opp11 = str_replace('-m', '', $opp10);
$opp12 = str_replace('-f', '', $opp11);
$opp13 = str_replace('-pirouette', '', $opp12);
$opp14 = str_replace('-large', '', $opp13);
$opp15 = str_replace('-small', '', $opp14);
$opp16 = str_replace('-super', '', $opp15);
$opp17 = str_replace('-sky', '', $opp16);
$opp18 = str_replace('-east', '', $opp17);
$opp19 = str_replace('-therian', '', $opp18);
$opp20 = str_replace('-active', '', $opp19);
$opp21 = str_replace('-blade', '', $opp20);
$opp22 = str_replace('-sunshine', '', $opp21);
$opp23 = str_replace('-zen', '', $opp22);
$opplast= ucfirst($opp23);
?>
<?php
include 'php/cookie clean.php';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <!-- Phone  https://goo.gl/CvCEpm -->
    <meta name="theme-color" content="red"><!-- Chrome, Firefox OS and Opera -->
    <meta name="msapplication-navbutton-color" content="red"><!-- Windows Phone -->
    <meta name="apple-mobile-web-app-capable" content="yes"><!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="red"> <!-- iOS Safari -->
    <!-- Phone END -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name='author' content='Samuel Levin, Samuel_ipad2@hotmail.com'>
    <meta name='author' content='Sam Zhu, shengbozhu@yahoo.com'>
    <meta name="application-name" content="Pokemon Journey" />
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png" />
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="red">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="red">
    <title>Battle</title>
    <link rel="stylesheet" href="css/battle.css">
    <link rel="stylesheet" href="animate.css">
</head>
<body oncontextmenu="return false"> <!-- Prevent from right click-->
<audio autoplay id="battlemusic">
    <source src="Pokemon%20Stadium%20-%20Gym%20Leader%20Battle.mp3" type="audio/mpeg">
</audio>
<script src="js/disable.js"></script>
<script src="js/battlemenu.js"></script>
<img id="bg" src="<?php echo $field[rand(0, count($field) - 1)]; ?>">
<img id="pokemon" class="animated slideInLeft" src="<?php echo $opp; ?>">
<img id="urpokemon" class="animated slideInLeft" src="battle/pikachu-f.gif">
<div id="status" class="animated fadeInRight">
    <img id="status" src="battle/your%20status.png">
    <p id="pika">Pikachu</p>
</div>
<div id="oppstatus" class="animated fadeInLeft">
    <img id="status" src="battle/oppenent%20status.png">
    <p id="opp"><?php echo $opplast ?></p>
</div>
<div id="menu" class="animated fadeInRight">
    <div>
        <button id="" onclick="fight();">Fight</button>
        <button id="" onclick="bait(); Alert.render('You threw some Bait at <?php echo $opplast ?>! <br> <?php echo $opplast ?> is eating!'); ">Bait</button>
        <br>
        <button id="" onclick="pokeball(); Alert.render('You caught a <?php echo $opplast ?> <br> ****COMING SOON****'); ">Pokeball</button>
        <button id="" onclick="run(); ">Run</button>
    </div>
</div>
<div id="dialogbox">
    <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
    </div>
</div>
<audio id="run">
    <source src="battle/soundeffects/run.mp3" type="audio/mpeg">
</audio>
<audio id="pokeball">
    <source src="battle/soundeffects/thrownpokeball.mp3" type="audio/mpeg">
</audio>
<audio id="thunderbolt">
    <source src="battle/soundeffects/thunderbolt.mp3" type="audio/mpeg">
</audio>
<audio id="bait">
    <source src="battle/soundeffects/bait.mp3" type="audio/mpeg">
</audio>
<audio id="error">
    <source src="battle/soundeffects/error.mp3" type="audio/mpeg">
</audio>
<div id="thunder">
    <img src="battle/thunderbolt.gif">
</div>
</body>
</html>