<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/modsaktivitas.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$activity = new aktivitas($connection);

$data = json_decode(file_get_contents("php://input"));

$activity->nama = $data->nama;
$activity->status = $data->status;

    if(empty($data->nama)){
        echo '{';
            echo '"message": "aktivitas belum dimasuukan"';
        echo '}';
        return;
    }elseif(empty($data->status)){
        echo '{';
            echo '"message": "status belum dimasuukan"';
        echo '}';
        return;
    }
    if($activity->create()){
        echo '{';
            echo '"message": "Aktivitas berhasil dimasuukan"';
        echo '}';
        return;
    }else {
        echo '{';
            echo '"message": "Aktivitas gagal dimasuukan"';
        echo '}';
    }
    