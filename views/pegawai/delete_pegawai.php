<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('pegawai', 'id_pegawai', $id);
    if ($hasil) {
        header('location: view_pegawai.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>