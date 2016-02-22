<?php

$messages = array(
    'pokemonsprites/abomasnow.gif',
    'pokemonsprites/abomasnow-mega.gif',
    'pokemonsprites/abra.gif',
    'pokemonsprites/absol.gif',
    'pokemonsprites/absol-mega.gif',
    'pokemonsprites/accelgor.gif',
    'pokemonsprites/aegislash.gif',
    'pokemonsprites/aerodactyl.gif',
    'pokemonsprites/aerodactyl-mega.gif',
    'pokemonsprites/aggron.gif',
    'pokemonsprites/aggron-mega.gif',
    'pokemonsprites/aggron.gif',
    'pokemonsprites/aipom.gif',
    'pokemonsprites/abra.gif'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Battle</title>
    <style>
        img#bg {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
        }
        img#pokemon {
            position: absolute;
            left: 70%;
            top: 50%
        }
        button#capture {
            position: absolute;
            right: 10%;
            bottom: 20%;
        }
    </style>
</head>
<body>
    <img id="bg" src="battle.jpg">
    <img id="pokemon" src="<?php echo $messages[rand(0, count($messages) - 1)]; ?>">
    <button id="capture">capture</button>
</body>
</html>