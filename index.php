<?php
error_reporting(0);
$username = $_POST['username'];
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_POST['password']))));
$userlist = file ('save/' . $username . '.txt');
$oldpassword = md5(sha1($_POST['password']));

$success = false;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $username && $user_details[1] == $password) {
        $gender = $user_details[2];
        $step = $user_details[3];
        $premiumuser = $user_details[4];
        $startdate = $user_details[5];
        $idnumber = $user_details[6];
        $admin = $user_details[7];
        $success = true;
        break;
    }
    elseif ($user_details[0] == $username && $user_details[1] == $oldpassword) {
        echo "We have updated the encryption of the password <br>";
        echo "meaning that it is less hackable<br>";
        echo "<form action=\"newpass.php\" method=\"post\">
    <p>Your username: <input type=\"text\" name=\"username\" maxlength=\"15\" minlength=\"3\" required/></p>
    <p>Old Password: <input type=\"password\" name=\"oldpassword\" maxlength=\"15\" minlength=\"5\" required/></p>
    <p>New Password: <input type=\"password\" name=\"password\" maxlength=\"15\" minlength=\"5\" required/></p>
    <p><input type=\"submit\" /></p>
</form>";
        echo "<br>You can use the same Password if you like";
    }
}
if ($success) {
    $idnumber2 = sprintf("%08d", $idnumber);
} else {
    header('Location: login.php');
    die();
}
if ($admin == "admin"){
//    ADMIN PAGE
    echo "<a href=\"admin.php\"><button class=\"btn-1\" style=\"float:left;\">Admin login</button></a><br>";
}
if ($admin == "disable"){
//    DISABLE PAGE
    echo "Your account has been blocked";
    die();
}
else{

}
?>
<?php
switch ($step){
    case ($step < 0);
        $achievement = "Seriously stop breaking the game";
        echo "Seriously stop breaking the game";
        break;
    case ($step >= 0 && $step < 100);
        $achievement = "Welcome to the game <br> Try to get 100 steps and save the game";
        $badge1 = "img/badge0.png";
        $badge2 = "img/badge0.png";
        $badge3 = "img/badge0.png";
        $badge4 = "img/badge0.png";
        $badge5 = "img/badge0.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 100 && $step < 300);
        $achievement = "1st Gym badge achieved <br> Try to get 300 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge0.png";
        $badge3 = "img/badge0.png";
        $badge4 = "img/badge0.png";
        $badge5 = "img/badge0.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 300 && $step < 600);
        $achievement = "2nd Gym badge achieved <br> Try to get 600 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge0.png";
        $badge4 = "img/badge0.png";
        $badge5 = "img/badge0.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 600 && $step < 900);
        $achievement = "3rd Gym badge achieved <br> Try to get 900 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge0.png";
        $badge5 = "img/badge0.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 900 && $step < 1200);
        $achievement = "4th Gym badge achieved <br> Try to get 1200 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge4.png";
        $badge5 = "img/badge0.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 1200 && $step < 1500);
        $achievement = "5th Gym badge achieved <br> Try to get 1500 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge4.png";
        $badge5 = "img/badge5.png";
        $badge6 = "img/badge0.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 1500 && $step < 1800);
        $achievement = "6th Gym badge achieved <br> Try to get 1800 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge4.png";
        $badge5 = "img/badge5.png";
        $badge6 = "img/badge6.png";
        $badge7 = "img/badge0.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 1800 && $step < 2100);
        $achievement = "7th Gym badge achieved <br> Try to get 2100 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge4.png";
        $badge5 = "img/badge5.png";
        $badge6 = "img/badge6.png";
        $badge7 = "img/badge7.png";
        $badge8 = "img/badge0.png";
        break;
    case ($step >= 2100 && $step < 5000);
        $achievement = "8th Gym badge achieved <br> Try to get 5000 steps and save the game";
        $badge1 = "img/badge1.png";
        $badge2 = "img/badge2.png";
        $badge3 = "img/badge3.png";
        $badge4 = "img/badge4.png";
        $badge5 = "img/badge5.png";
        $badge6 = "img/badge6.png";
        $badge7 = "img/badge7.png";
        $badge8 = "img/badge8.png";
        break;
    case ($step >= 3000 && $step < 4000);
        $achievement = "Try to get 5000 to become Pokemon Champion";
        break;
    case ($step >= 5000);
        $achievement = "You are the Pokemon Champion";
        break;
    default:
        echo "a fatal error has occurred";
}
if ($steps >= 900){
    $username = $_GET['username'];
    $premiumm = "b";
    $myfile = file_get_contents("save/$username.txt");
    $userData = explode('|', $myfile);
    $userData[4] = $premiumm;
    file_put_contents("save/$username.txt", implode("|", $userData));
}
?>
<?php
if ($gender == "Male"){
    $photo = "potagonist/trainer000.1.png";

    if ($premiumuser == "a"){
        $startchar = "potagonist/1.png";
        $premiumname = "Not Premium User";
        $char = " '1.png', '2.png', '3.png', '4.png'";
    }
    else if ($premiumuser == "b"){
        $startchar = "potagonist/b1.png";
        $premiumname = "<img id='crown' src=\"img/crown.png\">";
        $char = " 'b1.png', 'b2.png', 'b3.png', 'b4.png'";
    }
    else{
        $startchar = "potagonist/1.png";
        $premiumname = "A fatal Error has occured";
        $char = " '1.png', '2.png', '3.png', '4.png'";
    }
}
else if ($gender == "Female"){
    $photo = "potagonist/trainer001.1.png";
    if ($premiumuser == "a"){
        $startchar = "potagonist/5.png";
        $premiumname = "Not Premium User";
        $char = " '5.png', '6.png', '7.png', '8.png'";
    }
    else if ($premiumuser == "b"){
        $startchar = "potagonist/b5.png";
        $premiumname = ">";
        $char = " 'b5.png', 'b6.png', 'b7.png', 'b8.png'";;
    }
    else{
        $startchar = "potagonist/5.png";
        $premiumname = "A fatal Error has occured";
        $char = " '5.png', '6.png', '7.png', '8.png'";
    }
}
else {
    $photo = "potagonist/trainer000.1.png";
    if ($premiumuser == "a"){
        $startchar = "potagonist/1.png";
        $premiumname = "Not Premium User";
        $char = " '1.png', '2.png', '3.png', '4.png'";
    }
    else if ($premiumuser == "b"){
        $startchar = "potagonist/b1.png";
        $premiumname = "<img id='crown' src=\"img/crown.png\">";;
        $char = " 'b1.png', 'b2.png', 'b3.png', 'b4.png'";
    }
    else{
        $startchar = "potagonist/1.png";
        $premiumname = "A fatal Error has occured";
        $char = " '1.png', '2.png', '3.png', '4.png'";
    }
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
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name='keywords' content='Pokemon Journey, Clicker, Fun, Pokemon, Journey, game, Hackathon, Javascript Game, HTML'>
    <meta name='description' content='This is a Pokémon Clicker game'>
    <meta name='subject' content='Pokemon Journey'>
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
    <title>Pokémon Journey</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Anonymous+Pro" />
    <link href="css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">></script>
    <script src="js/main.js"></script>
    <script src="js/dayandnightcycle.js"></script>
    <script src="js/character.js"></script>
    <script>
        var images = [<?php echo $char; ?>];
    </script>
</head>
<body>
<script>
    function savestep(){
    var x = document.getElementById('steps').innerHTML;
        document.getElementById('stepss').value = x
    }
</script>
<script>
</script>
<audio autoplay id="thethemesong">
    <source src="music/AquaDeepBasin%20-%20Pokemon%20Black%20and%20White%20Bike%20Remix.mp3" type="audio/mpeg">
</audio>
<script src="js/music.js"></script>
<div id="intro" style="display: none;"></div>
<div>
    <div>
        <h1 style="text-align: center">Pokémon Journey</h1>
        <img src="img/mute.png" onclick="mute()" style="position: absolute; right: 5px; top: 0; z-index: 20; width: 30px; height: 30px">
        <img id="ad" src="img/bg%20day.png">
        <img id="ad2" src="img/bg%20day.png" />
        <button class="btn-1" style="float: right;" disabled>
            <script>var steps = <?php echo $step; ?>;</script>
            <p>Steps: <span id="steps"><?php echo $step; ?></span></p>
        </button>
        <div>
            <img id="rr" src="<?php echo $startchar; ?>">
            <div id="step">
                <button class="btn-2" onclick="trainerid.pop();"><?php echo $username; ?></button>
                <button class="btn" id="ag" onclick="chng(); onClick(); playAudio(); Alert.done(); trainerid.done(); savestep();" type="button"><p>Click to Move</p></button>
                <form id="battle" name="view_form" method="post" action="battle.php"  target="Map" >
                    <input type="hidden" value="<?php echo $username; ?>" name="username"/>
                    <input type="hidden" value="<?php echo $password; ?>" name="password"/>
                    <input type="button" class="btn" id="ag2" style="display: none;" value="A wild Pokemon has appeared" onclick="battle(); pauseAudio();"   />
                </form>
                <script>
                    function battle()
                    {
                        var mapForm = document.getElementById("battle");             map=window.open("","Map","status=0,title=0,height=600,width=800,scrollbars=0,menubar=0,toolbar=0");
                        if (map) {
                            mapForm.submit();
                        } else {
                            alert('You must allow popups for this map to work.');
                        }
                    }
                </script>
                </a>
                <form action="save.php" method="post" onclick="savestep()">
                    <input type="hidden" name="username" value="<?php echo $username; ?>"/>
                    <input type="hidden" name="steps" id="stepss" value="" />
                    <input class="btn-2" type="submit" value="Save & Logout"/>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="about">
    <h1>This is a Pokémon Clicker game</h1>
    <h3>Created by Samuel Levin and Sam Zhu</h3>
</div>
<div id="howto">
    <h1>How to play</h1>
    <h3>To play the game you spam "Click to Move" Button to gain steps,</h3>
    <h3>With the gradually going up, You will notice Pokémon will spawn in</h3>
    <h3>Your job is too catch them all.</h3>
    <p>**This game is also semi-compatible on Mobile Phones**</p>
    <br>
    <h1>Hint</h1>
    <p>Press "M" to mute music</p>
    <p>To unlock Premium you must walk till 900 steps, *then Save & Refresh</p>
    <div id="footer">
        <a href="https://github.com/Bamuel/Pokemon-Journey">
            <img id="image" src="img/githubtransparent.png">
            <br>
            <p>Star this project on Github, it will mean alot</p>
        </a>
        <br>
        <pre>This uses images from Game Freak Inc. (Pokemon)  and 3rd party sources. This game is only for educational and entertainment purposes</pre>
    </div>
</div>
<div id="red">
    <p style="text-align: center; position: relative; top: -7.5px;"><?php echo $username; ?></p>
    <button onclick="trainerid.done()" style="float: right; position: relative; z-index: 13; top: -45px;">Close</button>
    <div id="white">
        <img id="profile" src="<?php echo $photo; ?>">
        <div id="profileabout">
            <pre>POKEMON SEEN : ###</pre>
            <pre>POKEMON CAUGHT : ###</pre>
            <pre>TRAINER ID : <?php echo $idnumber2; ?></pre>
            <pre>START DATE : <?php echo $startdate; ?></pre>
        </div>
        <div id="badges">
            <ul>
                <li><img id="badge" src="<?php echo $badge1; ?>"></li>
                <li><img id="badge" src="<?php echo $badge2; ?>"></li>
                <li><img id="badge" src="<?php echo $badge3; ?>"></li>
                <li><img id="badge" src="<?php echo $badge4; ?>"></li>
                <li><img id="badge" src="<?php echo $badge5; ?>"></li>
                <li><img id="badge" src="<?php echo $badge6; ?>"></li>
                <li><img id="badge" src="<?php echo $badge7; ?>"></li>
                <li><img id="badge" src="<?php echo $badge8; ?>"></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
