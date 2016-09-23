<?php
session_start();
error_reporting(0);

$username = $_POST['username'];
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_POST['password']))));
$success = false;
$userlogin = file ('save/' . $username . '.txt');
foreach ($userlogin as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $username && $user_details[1] == $password) {
        $_SESSION["username"] = $user_details[0];
        $_SESSION["gender"] = $user_details[2];
        $_SESSION["step"] = $user_details[3];
        $_SESSION["premiumuser"] = $user_details[4];
        $_SESSION["startdate"] = $user_details[5];
        $_SESSION["idnumber"] = $user_details[6];
        $_SESSION["admin"] = $user_details[7];
        $success = true;
        break;
    }
}
if ($success) {
    header("Location: index.php");
    die();
}
if(isset($_POST['submit'])){
    if (empty($_POST['username'])){
        $error = "You can not leave out username";
    }
    else {
        $error = "A fatal error occurred";
    }
    echo $error;
}
echo $_SESSION["error"];
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
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta name="msapplication-TileColor" content="red">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="red">
    <title>Login</title>
</head>
<body>
<style>
    a{
        font-size: large;
        color: red;
    }
    a:hover{
        color: blue;
    }
</style>
<div class="loginbox">
    <div style="margin-left: 20px;">
        <h1>Login</h1>
        <pre>To register click <a href="register.php"><b>here</b></a></pre>
        <pre>If you are getting redirected back here, Than your password/username is wrong</pre>
        <pre></pre>
        <form action="<?=$_SERVER['PHP_SELF'];?>" autocomplete="off" method="post">
            <img id="usericon" src="img/username.png"><p style="margin-left: 35px;">Username: <input type="text" name="username" maxlength="15" minlength="3" required/></p>
            <img id="passwordicon" src="img/password.png"><p style="margin-left: 35px;">Password: <input type="password" name="password" maxlength="15" minlength="5" required/></p>
            <p><input type="submit" name="submit" class="btn-login" value="Login"/></p>
        </form>
    </div>
</div>
<br>
<div id="promo">
    <iframe id="promo1" src="demobattle.php"  frameBorder="0"></iframe>
    <div style="background-color: #36596F; width: 540px; height: 35px; text-align: center; position: absolute; z-index: 20; left: 668px; top: 407px; border-top-left-radius: 15px; border-top-right-radius: 15px; opacity: 0.8">
        <p style="color: white; font-size: larger; margin-top: 5px; font-family: Arial">Explore the world</p>
    </div>
    <img id="promo2" src="img/promogif/final.gif">
</div>
<footer style="color: ghostwhite">
    This uses images from Game Freak Inc. (Pokemon)  and 3rd party sources. This game is only for educational and entertainment purposes
</footer>
</body>
</html>