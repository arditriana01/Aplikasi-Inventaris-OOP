<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('level', 'id_level', $id);
    if ($hasil) {
        header('location: view_level.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>