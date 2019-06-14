<?php

include 'connect.php';

Class Pengembalian extends connect
{

    public function view()
    {
        $query = "SELECT peminjaman.*, inventaris.nama, inventaris.kode_inventaris, detail_pinjam.jumlah, pegawai.nama_pegawai 
                  FROM peminjaman, inventaris, detail_pinjam, pegawai 
                  WHERE peminjaman.id_peminjaman = detail_pinjam.id_peminjaman 
                  AND inventaris.id_inventaris   = detail_pinjam.id_inventaris 
                  AND pegawai.id_pegawai         = peminjaman.id_pegawai  
                  AND peminjaman.status_peminjaman = 'Sudah Kembali' 
                  ORDER BY id_peminjaman DESC";
        
        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_assoc()){
                $result[] = $row;
            }
            return $result;
        }                         
    } 

    public function pengembalianBarang($id, $jumlah, $id_inventaris)
    {
        $sql = "UPDATE peminjaman SET tanggal_kembali=NOW(), status_peminjaman='Sudah Kembali' WHERE id_peminjaman='$id'";

        $query = $this->conn->query($sql);

        if($query){
            $sqlStok = "UPDATE inventaris SET jumlah = jumlah + $jumlah WHERE id_inventaris = $id_inventaris";

            $queryStok = $this->conn->query($sqlStok);

            if($queryStok){
                echo "<script>alert('Barang Berhasil Dikembalikan');window.location.href='pengembalian.php';</script>";
                exit();
            }                
        } else {
            echo "<script>alert('Barang Gagal Dikembalikan');window.location.href='peminjaman/view_peminjaman.php';</script>";
            exit();
        }
    }

}