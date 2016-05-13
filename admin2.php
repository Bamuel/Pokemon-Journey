<?php
error_reporting(0);
$username = $_POST['username'];
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_POST['password']))));
$userlist = file ('save/' . $username . '.txt');
$ip = $_SERVER['REMOTE_ADDR'];
$redirct = "<script> setTimeout(function () { window.location.href= 'index.php'; },3000); </script>";
$success = false;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $username && $user_details[1] == $password && $user_details[7] == "admin") {
        $success = true;
        break;
    }
}
if ($success){
}
else{
    echo "Incorrect Password";
    echo $redirct;
    die();
}
$number = new FilesystemIterator('save/', FilesystemIterator::SKIP_DOTS);
$idnumber = iterator_count($number);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>ADMIN</title>
</head>
<body>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
    a{
        font-size: medium;
        color: red;
    }
    a:hover{
        color: blue;
    }
</style>
<a href="index.php">Back to game</a>
<table>
    <tr>
        <th>Your Username:</th>
        <td><?php echo $username; ?></td>
    </tr>
    <tr>
        <th>Your IP Address</th>
        <td><?php echo $ip; ?></td>
    </tr>
    <tr>
        <th>Registered Users</th>
        <td><?php echo $idnumber; ?></td>
    </tr>
</table>
<br>
<pre>Registered Users</pre>
<table>
    <tr>
        <td>User</td>
        <td>Gender</td>
        <td>Steps</td>
        <td>Bike</td>
        <td>Start Date</td>
        <td>Trainer ID</td>
        <td>Delete</td>
    </tr>
<?php
$dir = "save/";
// Sort in ascending order
$a = scandir($dir);
foreach($a as $user) {
    $users = str_replace('.txt', '', $user);
    $userlist = file ('save/' . $users . '.txt');
    foreach ($userlist as $user2) {
        $user_details = explode('|', $user2);
        $username2 = $user_details[0];
        $password = $user_details[1];
        $gender = $user_details[2];
        $step = $user_details[3];
        $premiumuser = $user_details[4];
        $startdate = $user_details[5];
        $idnumber = $user_details[6];
        $admin2 = $user_details[7];
        $idnumber2 = sprintf("%08d", $idnumber);
        if ($admin2 == "admin"){
            $del = "Admin";
        }
        else{
            $del = "<a>&#x2421</a>";
        }
        if ($premiumuser == "a"){
            $bike = "&#x2717";
        }
        elseif ($premiumuser == "b"){
            $bike = "&#10004;";
        }
        elseif ($username == "null"){
            $bike = "null";
        }
        else{
            $bike = "error";
        }
    }
    echo "<tr><td>" . $username2 . "</td><td>" . $gender . "</td><td>" . $step . "</td><td>" . $bike . "</td><td>" . $startdate . "</td><td>" . $idnumber2 . "</td><td>" . $del . "</td></tr>";
}

?>
</table>
</body>
</html>
