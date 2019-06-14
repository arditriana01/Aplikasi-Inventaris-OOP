<?php
include 'connect.php';

class Peminjaman extends Connect
{
        
    // fungsi untuk menampilkan data dari tabel peminjaman
    public function view()
    {
        $query = "SELECT peminjaman.*, inventaris.nama, inventaris.kode_inventaris,inventaris.id_inventaris, detail_pinjam.jumlah,                                                    pegawai.nama_pegawai 
                  FROM   peminjaman, inventaris, detail_pinjam, pegawai 
                  WHERE  peminjaman.id_peminjaman = detail_pinjam.id_peminjaman AND 
                         inventaris.id_inventaris = detail_pinjam.id_inventaris AND
                         peminjaman.id_pegawai = pegawai.id_pegawai AND
                         peminjaman.status_peminjaman = 'Sedang Dipinjam' ORDER BY peminjaman.id_peminjaman DESC";
        
        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_assoc())
            {
                $result[] = $row;
            }
            return $result; 
        }
    }
    
    // fungsi untuk menampilkan 2 data dari tabel pegawai yaitu id_pegawaidan nama_pegawai
    public function getPegawai()
    {
        $query = "SELECT id_pegawai, nama_pegawai FROM pegawai";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }
    
    // fungsi untuk menampilkan 3 data dari tabel inventaris yaitu id_inventaris, nama, jumlah data dalam inventaris
    public function getInventaris()
    {
        $query = "SELECT id_inventaris, nama, jumlah FROM inventaris";

        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_array())
            {
                $result[] = $row;
            }
            return $result; 
        }
    }

    // fungsi untuk menampilkan data stok yang berada di tabel inventaris
    public function getStok($barang){
        
        $query = "SELECT jumlah FROM inventaris WHERE id_inventaris = '$barang' ";

        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_array())
            {
                $result[] = $row;
            }
            return $result; 
        }
        
    }

    // fungsi untuk menambahkan data peminjaman dengan input 2 tabel dan digunakan untuk menambahkan data peminjaman untuk hak akses admin & operator
    public function insertPeminjaman($barang, $jumlah, $tanggal_pinjam, $pegawai)
    {
        // fungsi untuk menginputkan data tabel peminjaman terlebih dahulu
        $sqlPeminjaman = "INSERT INTO peminjaman VALUES(NULL, '$tanggal_pinjam','', 'Sedang Dipinjam', '$pegawai')";

        $queryPeminjaman = $this->conn->query($sqlPeminjaman);

        if($queryPeminjaman)
        {
            // jika tabel pertama berhasil di inputkan maka dilanjutkan menginptukan data dari tabel detail_pinjam
            $sqlDetail = "INSERT INTO detail_pinjam VALUES(NULL, '$barang', '$jumlah', LAST_INSERT_ID())";

            $queryDetail = $this->conn->query($sqlDetail);

            if($queryDetail){
                echo "<script>alert('Berhasil Melakukan Peminjaman');window.location.href='view_peminjaman.php';</script>";
            }else {
             echo "<script>alert('Gagal Melakukan Peminjaman');window.location.href='view_peminjaman.php';</script>";
             exit();
            }
        } 
    }

    // fungsi ini digunakan untuk menambahkan data peminjaman untuk hak akses pegawai/peminjam
    public function peminjamBarang($barang, $jumlah, $tanggal_pinjam, $pegawai)
    {
        $sqlPeminjaman = "INSERT INTO peminjaman VALUES(NULL,'$tanggal_pinjam','','Sedang Dipinjam','$pegawai')";

        $queryPeminjaman = $this->conn->query($sqlPeminjaman);

        if($queryPeminjaman)
        {
            $sqlDetail = "INSERT INTO detail_pinjam VALUES(NULL, '$barang', '$jumlah', LAST_INSERT_ID())";

            $queryDetail = $this->conn->query($sqlDetail);

            if($queryDetail){
                echo "<script>alert('Berhasil Melakukan Peminjaman');window.location.href='add_peminjaman.php';</script>";
                exit();
            } else {
             echo "<script>alert('Gagal Melakukan Peminjaman');window.location.href='add_peminjaman.php';</script>";
             exit();
            }
        } 
    }

}


?>