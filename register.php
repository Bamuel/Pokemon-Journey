<?php
#The register page
error_reporting(0);

$username = htmlspecialchars($_POST['username']);
$gender = htmlspecialchars($_POST['gender']);
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_POST['password']))));
$number = new FilesystemIterator('save/', FilesystemIterator::SKIP_DOTS);
$idnumber = iterator_count($number);

if(isset($_POST['submit'])){
    if (file_exists("save/" . $username . "/" . $username . ".txt")) {
        $error = "Username already exist";
    }
    elseif ($_POST['password'] != $_POST['confirm_password']){
        $error = "Password did not match";
    }
    elseif (empty($_POST['username'])){
        $error = "You can not leave out username";
    }
    elseif (empty($_POST['password'])){
        $error = "You can not leave out password";
    }
    elseif (strlen($_POST['password']) < 4) {
        $error = "Your password needs to be longer";
    }
    elseif (strlen($_POST['username']) < 4) {
        $error = "Your username needs to be longer";
    }
    elseif (strlen($_POST['gender']) == "Male" || strlen($_POST['gender']) == "Female"  ) {
        $error = "Invalid Gender";
    }
    else {
        $register = $username . "|" . $password . "|" . $gender . "|0|a|" . date("d/m/Y") . "|" . $idnumber ;
        mkdir('save/' . $username, 0777, true);
        $myfile = fopen("save/" . $username . "/" . $username . ".txt", "w") or die("Unable to open file!");
        fwrite($myfile, $register);
        fclose($myfile);
        header("Location: index.php");
        die();
    }
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
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <meta name="msapplication-TileColor" content="red">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="red">
    <title>Register</title>
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
<div class="registerbox">
<div style="margin-left: 20px;">
<h1>Register</h1>
<pre>Your password will be saved as a hash (md5 & sha1), 
Meaning that noone will be able to access to your password *Not even me*</pre>
<pre>The same thing that Google, Youtube, Facebook, etc... use</pre>
<pre>currently used hash(whirlpool ,hash(sha256 ,md5(sha1(</pre>
<pre>Your password will be encrypted 4 diffrent ways</pre>
<pre>For more information click <a href="http://php.net/manual/en/faq.passwords.php" target="_blank"><b>here</b></a> </pre>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <p>Your username: <input type="text" name="username" maxlength="15" minlength="3" required/></p>
    <p>Your Password: <input type="password" name="password" maxlength="15" minlength="5" required/></p>
    <p>Confirm Password: <input type="password" name="confirm_password" maxlength="15" minlength="5" required/></p>
    <p>Your gender: </p>
    <input type="radio" name="gender" value="Male" checked required> Male<br>
    <input type="radio" name="gender" value="Female" required> Female<br>
    <p><input class="btn-register" name="submit" type="submit" /></p>
    </form>
    </div>
    </div>

</body>
</html>