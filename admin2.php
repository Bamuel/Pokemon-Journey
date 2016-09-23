<?php
session_start();
error_reporting(0);

if ($_SESSION["admin"] == "admin"){
}
else{
    $_SESSION["error"] = "You are not admin";
    header("Location: login.php");
    die();
}
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['disable'])){
    $usernametodisable = $_POST['username'];
    if (file_exists("save/" . $usernametodisable . ".txt")) {
        $myfile = file_get_contents("save/$usernametodisable.txt");
        $userData = explode('|', $myfile);
        $userData[7] = "disable";
        file_put_contents("save/$usernametodisable.txt", implode("|", $userData));
        echo "Account has been disabled";
    }
}
else{
}
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
        height: 1px;
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
        <td><?php echo $_SESSION["username"]; ?></td>
    </tr>
    <tr>
        <th>Your IP Address</th>
        <td><?php echo $ip; ?></td>
    </tr>
    <tr>
        <th>Registered Users</th>
        <td><?php echo $_SESSION["idnumber"]; ?></td>
    </tr>
</table>
<br>
<pre>Disable an account</pre>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" autocomplete="off">
    <p>Username: <input type="text" name="username"required/></p>
    <p><input name="disable" type="submit" /></p>
</form>
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
        <td>Status</td>
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
            $disable = "<p style='color: red; font-size: xx-small'>Admin</p>";
        }
        elseif ($admin2 == "disable"){
            $disable = "Disabled";
        }
        else{
            $disable = "";
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
    echo "<tr><td>" . $username2 . "</td><td>" . $gender . "</td><td>" . $step . "</td><td>" . $bike . "</td><td>" . $startdate . "</td><td>" . $idnumber2 . "</td><td>" . $disable . "</td></tr>";
}

?>
</table>
</body>
</html>
