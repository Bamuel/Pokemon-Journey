<?php
error_reporting(0);
$username = $_GET['username'];
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_GET['password']))));
$userlist = file ('save/' . $username . '.txt');
$oldpassword = md5(sha1($_GET['oldpassword']));

$success = false;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $username && $user_details[1] == $oldpassword) {
        $myfile = file_get_contents("save/$username.txt");
        $userData = explode('|', $myfile);
        $userData[1] = $password;
        file_put_contents("save/$username.txt", implode("|", $userData));
        $backtoold = $_SERVER['HTTP_REFERER'];
        $redirct = "<script> setTimeout(function () { window.location.href= '" . $backtoold . "'; },1); </script>";
        $success = true;
        break;
    }
}
echo "Password successfully updated";
echo $redirct;