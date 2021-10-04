<?php

include_once '../error.php';

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/modsaktivitas.php';

$dbclass = new dbclass();
$connection = $dbclass->getConnection();

$keseharian = new aktivitas($connection);

$statm = $keseharian->read();
$count = $statm->rowCount();

if($count > 0){

    $keseharian = array();
    $keseharian["body"] = array();
    $keseharian["count"] = $count;

    while ($row = $statm->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $p  = array(
              "id" => $id,
              "nama" => $nama,    
              "riwayat" => $riwayat
        );

        array_push($keseharian["body"], $p);
    }

    echo json_encode($keseharian);
    }
else{
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}