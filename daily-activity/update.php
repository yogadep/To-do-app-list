<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/modsaktivitas.php';

$dbclass = new dbclass();
$connection = $dbclass->getConnection();

$keseharian = new aktivitas($connection);

$data = json_decode(file_get_contents("php://input"));

$keseharian->id = $_GET["idKeseharian"];
$keseharian->nama = $data->nama;
$keseharian->riwayat = $data->riwayat;

if($keseharian->update()){
    echo '{';
        echo '"Message": Berhasil mengubah aktivitas';
    echo '}';   
}else {
    echo '{';
        echo '"Message": Gagal mengubah aktivitas';
    echo '}';   
}
?>