<?php

include '../../function/connect.php';

$connect = new Connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = $connect->delete_data('jenis', 'id_jenis', $id);
    if ($hasil) {
        header('location: view_jenis.php');
    }else{
        echo 'Gagal Hapus';
    }
}

?>