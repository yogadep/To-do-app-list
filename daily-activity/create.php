<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/modsaktivitas.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$keseharian = new aktivitas($connection);

$data = json_decode(file_get_contents("php://input"));

$keseharian->nama = $data->nama;
$keseharian->riwayat = $data->riwayat;

    if(empty($data->nama)){
        echo '{';
            echo '"Message": "Nama aktivitas belum dimasuukan"';
        echo '}';
        return;
    }elseif(empty($data->riwayat)){
        echo '{';
            echo '"Message": "Nama status belum dimasuukan"';
        echo '}';
        return;
    }
    if($keseharian->create()){
        echo '{';
            echo '"message": "Aktivitas berhasil dimasuukan"';
        echo '}';
        return;
    }else {
        echo '{';
            echo '"message": "Aktivitas gagal dimasuukan"';
        echo '}';
    }
    