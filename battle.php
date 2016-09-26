<?php
//This code is for the future

session_start();
$username = $_SESSION["username"];

if (file_exists("save/" . $username . "/Pokemon.txt")) {
}
else{
    $pokemoncaughtfile = fopen("save/" . $username . "/Pokemon.txt", "w") or die("A error has occured");
    fclose($pokemoncaughtfile);
}

?>

<?php
error_reporting(0);
include 'src/PokemonAPI.php';
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

$pokemon = glob("pokemonsprites/" . "*.gif"); // Gets all gifs in that folder
$opp=$pokemon[rand(0, count($pokemon) - 1)];
$opp1 = str_replace('pokemonsprites/', '', $opp);
$opp2 = str_replace('.gif', '', $opp1);
$opp3 = str_replace('-1', '', $opp2);
$opp4 = str_replace('-2', '', $opp3);
$opp5 = str_replace('-3', '', $opp4);
$opp6 = str_replace('-4', '', $opp5);
$opp7 = str_replace('-5', '', $opp6);
$opp8 = str_replace('-megax', '', $opp7);
$opp9 = str_replace('-megay', '', $opp8);
$opp10 = str_replace('-mega', '', $opp9);
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
$opp24 = str_replace('-rainy', '', $opp23);
$opp25 = str_replace('-snowy', '', $opp24);
$opp26 = str_replace('-sunny', '', $opp25);
$opp27 = str_replace('-sunshine', '', $opp26);
$opp28 = str_replace('-autumn', '', $opp27);
$opp29 = str_replace('-summer', '', $opp28);
$opp30 = str_replace('-winter', '', $opp29);
$opp31 = str_replace('-attack', '', $opp30);
$opp32 = str_replace('-defense', '', $opp31);
$opp33 = str_replace('-speed', '', $opp32);
$opp34 = str_replace('-blue', '', $opp33);
$opp35 = str_replace('-orange', '', $opp34);
$opp36 = str_replace('-white', '', $opp35);
$opp37 = str_replace('-yellow', '', $opp36);
$opp38 = str_replace('-eternal', '', $opp37);
$opp39 = str_replace('-resolute', '', $opp38);
$opp40 = str_replace('-origin', '', $opp39);
$opp41 = str_replace('-black', '', $opp40);
$opp42 = str_replace('-white', '', $opp41);
$opp43 = str_replace('-fan', '', $opp42);
$opp44 = str_replace('-frost', '', $opp43);
$opp45 = str_replace('-heat', '', $opp44);
$opp46 = str_replace('-mow', '', $opp45);
$opp47 = str_replace('-wash', '', $opp46);
$opp48 = str_replace('-bravo', '', $opp47);
$opp49 = str_replace('-charlie', '', $opp48);
$opp50 = str_replace('-delta', '', $opp49);
$opp51 = str_replace('-echo', '', $opp50);
$opp52 = str_replace('-exclamation', '', $opp51);
$opp53 = str_replace('-foxtrot', '', $opp52);
$opp54 = str_replace('-golf', '', $opp53);
$opp55 = str_replace('-hotel', '', $opp54);
$opp56 = str_replace('-india', '', $opp55);
$opp57 = str_replace('-interrogation', '', $opp56);
$opp58 = str_replace('-juliet', '', $opp57);
$opp59 = str_replace('-kilo', '', $opp58);
$opp60 = str_replace('-lima', '', $opp59);
$opp61 = str_replace('-mike', '', $opp60);
$opp62 = str_replace('-november', '', $opp61);
$opp63 = str_replace('-oscar', '', $opp62);
$opp64 = str_replace('-papa', '', $opp63);
$opp65 = str_replace('-quebec', '', $opp64);
$opp66 = str_replace('-romeo', '', $opp65);
$opp67 = str_replace('-sierra', '', $opp66);
$opp68 = str_replace('-tango', '', $opp67);
$opp69 = str_replace('-uniform', '', $opp68);
$opp70 = str_replace('-victor', '', $opp69);
$opp71 = str_replace('-whiskey', '', $opp70);
$opp72 = str_replace('-xray', '', $opp71);
$opp73 = str_replace('-yankee', '', $opp72);
$opp74 = str_replace('-zulu', '', $opp73);
$opp75 = str_replace('-archipelago', '', $opp74);
$opp76 = str_replace('-continental', '', $opp75);
$opp77 = str_replace('-elegant', '', $opp76);
$opp78 = str_replace('-fancy', '', $opp77);
$opp79 = str_replace('-garden', '', $opp78);
$opp80 = str_replace('-highplains', '', $opp79);
$opp81 = str_replace('-jungle', '', $opp80);
$opp82 = str_replace('-marine', '', $opp81);
$opp83 = str_replace('-meadow', '', $opp82);
$opp84 = str_replace('-modern', '', $opp83);
$opp85 = str_replace('-monsoon', '', $opp84);
$opp86 = str_replace('-ocean', '', $opp85);
$opp87 = str_replace('-pokeball', '', $opp86);
$opp88 = str_replace('-polar', '', $opp87);
$opp89 = str_replace('-sandstorm', '', $opp88);
$opp90 = str_replace('-savannah', '', $opp89);
$opp91 = str_replace('-sun', '', $opp90);
$opp92 = str_replace('-tundra', '', $opp91);
$opp93 = str_replace('-sandy', '', $opp92);
$opp94 = str_replace('-trash', '', $opp93);
$opp95= ucfirst($opp94);

$opplast = new \PokemonAPI\Pokemon($opp95);
$pokemonname = $opplast->getName();
$pokemonhp = $opplast->getHp();
if ($pokemonname == ""){
    $pokemonname = "Error";
    $pokemonhp = "50";
}
$pokemonhpmax = $pokemonhp;
$pokemonhp85 = $pokemonhpmax * 17 / 20;
$pokemonhp75 = $pokemonhpmax * 3 / 4;
$pokemonhp25 = $pokemonhpmax * 1 / 4;

$pikachu = new \PokemonAPI\Pokemon(25);
$pikachuhp = $pikachu->getHp();
$pikachuname = $pikachu->getName();
$pikachuhpmax = $pikachuhp * 2;
$pikachuhp85 = $pikachuhpmax * 17 / 20;
$pikachuhp75 = $pikachuhpmax * 3 / 4;
$pikachuhp25 = $pikachuhpmax * 1 / 4;

if ($pokemonname == "Error"){
    header("Location: battle.php");
    die();
}

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
    <link rel="stylesheet" href="css/animate.css">
</head>
<body oncontextmenu="return false"> <!-- Prevent from right click-->
<audio autoplay id="battlemusic">
    <source src="music/Pokemon%20Stadium%20-%20Gym%20Leader%20Battle.mp3" type="audio/mpeg">
</audio>
<span style="display: none" id="opppokemons"><?php echo $pokemonname ?></span>
<!--<script src="js/disable.js"></script>-->
<script src="js/battlemenu.js"></script>
<img id="bg" src="<?php echo $field[rand(0, count($field) - 1)]; ?>">
<img id="pokemon" class="animated slideInLeft" src="<?php echo $opp; ?>">
<img id="urpokemon" class="animated slideInLeft" src="battle/pikachu-f.gif">
<div id="status" class="animated fadeInRight">
    <img id="status" src="battle/your%20status.png">
    <meter id="healthbar" value="<?php echo $pikachuhpmax; ?>" low="<?php echo $pikachuhp25; ?>" optimum="<?php echo $pikachuhp85; ?>" high="<?php echo $pikachuhp75; ?>" max="<?php echo $pikachuhpmax; ?>"></meter>
    <p id="pika"><?php echo $pikachuname ?> <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="health"><?php echo $pikachuhpmax; ?></span></p>
</div>
<div id="oppstatus" class="animated fadeInLeft">
    <img id="status" src="battle/oppenent%20status.png">
    <meter id="opphealthbar" value="<?php echo $pokemonhpmax; ?>" low="<?php echo $pokemonhp25; ?>" optimum="<?php echo $pokemonhp85; ?>" high="<?php echo $pokemonhp75; ?>" max="<?php echo $pokemonhpmax; ?>"></meter><br>
    <p id="opp"><?php echo $pokemonname ?> <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="opphealth"><?php echo $pokemonhpmax; ?></span></p>
</div>
<div id="menu" class="animated fadeInRight">
    <div>
        <button id="" onclick="fight();">Fight</button>
        <button id="" onclick="bait(); Alert.render('You threw some Bait at <?php echo $pokemonname ?>! <br> <?php echo $pokemonname ?> is eating!'); ">Bait</button>
        <br>
        <button id="" onclick="pokeball(); Alert.render('You caught a <?php echo $pokemonname ?> <br> ****COMING SOON****'); ">Pokeball</button>
        <button id="" onclick="run();">Run</button>
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