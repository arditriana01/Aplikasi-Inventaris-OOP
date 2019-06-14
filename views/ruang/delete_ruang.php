<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('ruang', 'id_ruang', $id);
    if ($hasil) {
        header('location: view_ruang.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>