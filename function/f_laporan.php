<?php

include 'connect.php';

Class Laporan extends Connect
{

    public function viewBulan($bulan)
    {
        $query = "SELECT peminjaman.*, inventaris.nama, inventaris.kode_inventaris, detail_pinjam.jumlah, pegawai.nama_pegawai 
                  FROM peminjaman, inventaris, detail_pinjam, pegawai 
                  WHERE peminjaman.id_peminjaman = detail_pinjam.id_peminjaman 
                  AND inventaris.id_inventaris   = detail_pinjam.id_inventaris 
                  AND pegawai.id_pegawai         = peminjaman.id_pegawai  
                  AND peminjaman.status_peminjaman = 'Sudah Kembali'
                  AND MONTH(tanggal_kembali) = '$bulan' ";
        
        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_assoc()){
                $result[] = $row;
            }
            return $result;
        }                         
    }

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

}

?>