<?php

//veri_kaydet.php

include './sys/db.php';

$panel      = $_REQUEST['panel'];
$akim       = $_REQUEST['akim'];
$gerilim    = $_REQUEST['gerilim'];
$sicaklik   = $_REQUEST['sicaklik'];
$nem        = $_REQUEST['nem'];

if(is_numeric($akim) && is_numeric($gerilim) && is_numeric($sicaklik) && is_numeric($nem)){

    $db->query("INSERT INTO veriler(panel_id, akim, gerilim, sicaklik, nem, tarih)
                VALUES('$panel','$akim','$gerilim','$sicaklik','$nem','".date('Y-m-d H:i:s')."')");

    echo ($db->insert_id > 0) ? '1' : 'err';


}else{
    echo "Tum alanlarin dogru gonderildiginden emin olun!";
}
