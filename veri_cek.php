<?php

//veri_cek.php

include './sys/db.php';



switch ($_REQUEST['goster']){

    case 'tarih_araligi':

        $t1 = $_REQUEST['t1'];
        $t2 = $_REQUEST['t2'];

        $qry = $db->query("SELECT akim, gerilim, sicaklik, nem, DATE_FORMAT(tarih, '%m-%d-%Y %H:%i:%s') AS tarih 
                  FROM veriler WHERE (tarih BETWEEN '".$t1."' AND '".$t2."') ORDER BY id DESC LIMIT 200");

        $arr = array();

        while ($row = $qry->fetch_assoc()){
            $arr[] = $row;
        }

        echo json_encode($arr);

        break;

    default:

        #date('Y-m-d H:i:s', time() - 60); //1 dk önce

        $tarih = date('Y-m-d H:i:s', time() - 60);

        $qry = $db->query("SELECT akim, gerilim, sicaklik, nem, DATE_FORMAT(tarih, '%m-%d-%Y %H:%i:%s') AS tarih 
                  FROM veriler WHERE tarih >= '".$tarih."' ORDER BY id DESC LIMIT 200");

        $arr = array();

        while ($row = $qry->fetch_assoc()){
            $arr[] = $row;
        }

        echo json_encode($arr);

        break;

}


