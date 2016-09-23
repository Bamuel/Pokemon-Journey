<?php
// just link a page here to take them to the sign in page
session_destroy();
header("Location: login.php");
die();