<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>ADMIN</title>
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
<h1>ADMIN LOGIN</h1>
<a href="index.php">Back to game</a>
<form action="admin2.php" method="post">
    <p>Username: <input type="text" name="username" maxlength="15" minlength="3" required/></p>
    <p>Password: <input type="password" name="password" maxlength="15" minlength="5" required/></p>
    <p><input type="submit" value="Login"/></p>
</form>
</body>
</html>