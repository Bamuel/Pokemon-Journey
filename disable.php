<?php
$username = $_POST['username'];
if ($username == "Bamuel"){
    echo "are you stupid";
}
else{
    $myfile = file_get_contents("save/$username.txt");
    $userData = explode('|', $myfile);
    $userData[7] = "disable";
    file_put_contents("save/$username.txt", implode("|", $userData));
    echo "Account has been disabled";
}
?>
<script>
setTimeout(function () { window.location.href= 'admin.php'; },10);
</script>