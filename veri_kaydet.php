<?php

//veri_kaydet.php

include './sys/db.php';

$akim       = $_REQUEST['akim'];
$gerilim    = $_REQUEST['gerilim'];
$sicaklik   = $_REQUEST['sicaklik'];
$nem        = $_REQUEST['nem'];

if(is_numeric($akim) && is_numeric($gerilim) && is_numeric($sicaklik) && is_numeric($nem)){

    $db->query("INSERT INTO veriler(akim, gerilim, sicaklik, nem, tarih) 
                VALUES('$akim','$gerilim','$sicaklik','$nem','".date('Y-m-d H:i:s')."')");
    echo "1_".$db->insert_id;

}else{
    echo "Tum alanlarin dogru gonderildiginden emin olun!";
}
