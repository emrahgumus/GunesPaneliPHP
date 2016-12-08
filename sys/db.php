<?php

header('Access-Control-Allow-Origin: *');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//db.php veri tabanı bağlantı dosyası

$db = new mysqli('192.168.99.100', 'root', 'root', 'gunes_paneli');


if($db->connect_errno > 0)
    exit('vt_coonnect');