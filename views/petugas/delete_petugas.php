<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('petugas', 'id_petugas', $id);
    if ($hasil) {
        header('location: view_petugas.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>