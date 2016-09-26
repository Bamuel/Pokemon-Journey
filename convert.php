<?php
//run this code to redirect the save files to each folder
//example save/Bamuel.txt to save/Bamuel/Bamuel.txt
$dir = "save/";
$c = scandir($dir);
foreach($c as $user) {
    $users = str_replace('.txt', '', $user);
    echo $users;
    if (!file_exists('save/' . $users)) {
        mkdir('save/' . $users, 0777, true);
        rename ("save/" . $user, "save/" . $users . "/" . $user);
    }
    else{
        rename ("save/" . $user, "save/" . $users . "/" . $user);
    }
}