<?php
if ($_GET['name'] == ""){
    header('Location: register.php');
    exit;
}
else {
}
?>
<?php
$ip = "$_SERVER[REMOTE_ADDR]";
$name = htmlspecialchars($_GET['name']);
$myfile = fopen("save/savename/" . $ip . ".txt", "w") or die("Unable to open file!");
fwrite($myfile, $name);
fclose($myfile);
?>
<?php
$ip = "$_SERVER[REMOTE_ADDR]";
$name = htmlspecialchars($_GET['gender']);
$myfile = fopen("save/savegender/" . $ip . ".txt", "w") or die("Unable to open file!");
fwrite($myfile, $name);
fclose($myfile);
?>
<script>
    setTimeout(function () {
        window.location.href= 'index.php';
    },5000);
</script>
    <p>Hi <?php echo htmlspecialchars($_GET['name']); ?></p>
    <p> You have successfully registered.</p>
    <p>You will be redirected to the game within 5 seconds.</p>

