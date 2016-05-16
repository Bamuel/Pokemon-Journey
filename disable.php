<?php
$username = $_POST['username'];
$myfile = file_get_contents("save/$username.txt");
//explode on the |
$userData = explode('|', $myfile);
//This should be the steps data. Replace it with the new value
$userData[7] = "disable";
//put the exploded string back together with the new steps value
file_put_contents("save/$username.txt", implode("|", $userData));
echo "Account has been disabled";
?>
<script>
setTimeout(function () { window.location.href= 'admin.php'; },10);
</script>