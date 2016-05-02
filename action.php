<?php
$username = htmlspecialchars($_GET['username']);
$password = md5(sha1($_GET['password']));
$gender = ucfirst($_GET['gender']);
$number = new FilesystemIterator('save/', FilesystemIterator::SKIP_DOTS);
$idnumber = iterator_count($number);
if (file_exists("save/" . $username . ".txt")) {
    echo "Username already exsist" . "<br>";
    echo "Try a different username";
    $redirct = "<script> setTimeout(function () { window.location.href= 'register.php'; },1000); </script>";
}
else {
$register = $username . "|" . $password . "|" . $gender . "|0|a|" . date("d/m/Y") . "|" . $idnumber ;
   $myfile = fopen("save/" . $username . ".txt", "w") or die("Unable to open file!");
    fwrite($myfile, $register);
    fclose($myfile);
    echo "Hi " . $username . "<br>";
    echo "You have successfully registered." . "<br>";
    echo "You will be redirected to the login screen within 3 seconds.";
    $redirct = "<script> setTimeout(function () { window.location.href= 'index.php'; },3000); </script>";
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
    <title>Register</title>
</head>
<body>
    <?php echo $redirct ?>
</body>
</html>

