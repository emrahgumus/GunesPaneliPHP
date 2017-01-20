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

        /*
        $tarih = date('Y-m-d H:i:s', time() - 60);

        $qry = $db->query("SELECT akim, gerilim, sicaklik, nem, DATE_FORMAT(tarih, '%m-%d-%Y %H:%i:%s') AS tarih
                  FROM veriler WHERE tarih >= '".$tarih."' ORDER BY id DESC LIMIT 200");

        $arr = array();

        while ($row = $qry->fetch_assoc()){
            $arr[] = $row;
        }

        echo json_encode($arr);
*/


        $qry = $db->query("SELECT akim, gerilim, sicaklik, nem, DATE_FORMAT(tarih, '%m-%d-%Y %H:%i:%s') AS tarih
                          FROM veriler ORDER BY id DESC LIMIT 200");

        $arr = null;

        $arr[0]['name'] = 'istanbul';
        $arr[1]['name'] = 'ankara';
        $arr[2]['name'] = 'izmir';
        $arr[3]['name'] = 'kocaeli';


        while ($row = $qry->fetch_assoc()){

          $arr[0]['data'][] = $row['akim'];
          $arr[1]['data'][] = $row['akim']+rand(5, 15);
          $arr[2]['data'][] = $row['akim']+rand(5, 15);
          $arr[3]['data'][] = $row['akim']+rand(5, 15);

        }

        echo json_encode($arr);



        break;

}
