<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';
include_once '../models/modsaktivitas.php';

$dbclass = new dbclass();
$connection = $dbclass->getConnection();

$keseharian = new aktivitas($connection);

$keseharian->id = $_GET['idKeseharian'];

if ($keseharian->delete()) {
    echo '{';
        echo '"message": "Berhasil menghapus data"';
    echo '}';
}
else {
    echo '{';
        echo '"message": "Gagal menghapus data"';
    echo '}';
}
