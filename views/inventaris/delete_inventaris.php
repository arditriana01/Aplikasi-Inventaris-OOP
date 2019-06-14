<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('inventaris', 'id_inventaris', $id);
    if ($hasil) {
        header('location: view_inventaris.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>