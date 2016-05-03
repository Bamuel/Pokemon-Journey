<?php
$username = $_GET['username'];
$fh = fopen('save/' . $username . '.txt', 'a');
fclose($fh);
unlink('save/' . $username . '.txt');
echo "Your account has been delted, Thank you for hacking";
?>
<script>
setTimeout(function () { window.location.href= 'index.php'; },10);
</script>