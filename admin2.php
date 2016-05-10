<?php
error_reporting(0);
$username = $_POST['username'];
$password = hash('whirlpool' ,hash('sha256' ,md5(sha1($_POST['password']))));
$userlist = file ('save/' . $username . '.txt');
$oldpassword = md5(sha1($_POST['password']));
$ip = $_SERVER['REMOTE_ADDR'];
$success = false;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ("Bamuel" ?: "Gh3rkins" == $username && $user_details[1] == $password) {
        $success = true;
        break;
    }
}
if ($success){
}
else{
    header('Location: login.php');
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
<ol>
<?php
$dir = "save/";
// Sort in ascending order
$a = scandir($dir);
foreach($a as $user) {
    echo "<li>" . $user . "</li>";
}
?>
</ol>
</body>
</html>
