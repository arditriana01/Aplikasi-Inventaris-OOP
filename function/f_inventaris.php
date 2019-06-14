<?php

include 'connect.php';

class Inventaris extends Connect
{
    // fungsi untuk menampilkan data dari tabel inventaris yang berisi penggabungan 3 tabel
    public function view()
    {
        $query = "SELECT inventaris.*, jenis.nama_jenis, ruang.nama_ruang, petugas.username 
                  FROM inventaris
                  INNER JOIN jenis ON inventaris.id_jenis = jenis.id_jenis
                  INNER JOIN ruang ON inventaris.id_ruang = ruang.id_ruang
                  INNER JOIN petugas ON inventaris.id_petugas = petugas.id_petugas
                  ORDER BY id_inventaris DESC";

        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_assoc()){
                $result[] = $row;
            }
            return $result;
        }
    }
    // fungsi untuk menampilkan 2 data dari tabel jenis yaitu id_jenis dan nama_jenis
    public function getJenis()
    {
        $query = "SELECT id_jenis, nama_jenis FROM jenis";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }
        
    // fungsi untuk menampilkan 2 data dari tabel ruang yaitu id_ruang dan nama_ruang
    public function getRuang()
    {
        $query = "SELECT id_ruang, nama_ruang FROM ruang";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }

    // fungsi untuk menampilkan 2 data dari tabel petugas yaitu id_petugas dan nama_petugas
    public function getPetugas()
    {
        $query = "SELECT id_petugas, nama_petugas FROM petugas";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }   

    // fungsi untuk menambahkan data untuk tabel inventaris
    public function insert($nama_barang, $kondisi_barang, $keterangan, $jumlah, $jenis, $tanggal_register,$ruang, $kode_inventaris, $petugas)
    {
        $query = "INSERT INTO inventaris VALUES(NULL, '$nama_barang', '$kondisi_barang', '$keterangan', '$jumlah', '$jenis', '$tanggal_register', '$ruang', '$kode_inventaris', '$petugas')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_inventaris.php';</script>";
        }
        return $hasil;
    }
    
    // fungsi untuk menampilkan data untuk yang akan di update berserta penggabungan 3 tabel
    public function view_edit($id)
    {
        $query = "SELECT inventaris.*, jenis.nama_jenis, ruang.nama_ruang, petugas.username
                  FROM inventaris
                  INNER JOIN jenis ON inventaris.id_jenis = jenis.id_jenis
                  INNER JOIN ruang ON inventaris.id_ruang = ruang.id_ruang
                  INNER JOIN petugas ON inventaris.id_petugas = petugas.id_petugas
                  WHERE id_inventaris = '$id' ";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array())
        {
            $result[] = $row;
        }
        return $result;
    }     

    // fungsi untuk mengupdate data untuk tabel inventaris
    public function update($id, $nama, $kondisi, $keterangan, $jumlah, $jenis, $tanggal_register, $ruang,$kode_inventaris, $petugas)
    {
        $query = "UPDATE inventaris set nama        = '$nama',
                                   kondisi          = '$kondisi', 
                                   keterangan       = '$keterangan',
                                   jumlah           = '$jumlah',
                                   id_jenis         = '$jenis',
                                   tanggal_register = '$tanggal_register',
                                   id_ruang         = '$ruang',                                   
                                   kode_inventaris  = '$kode_inventaris', 
                                   id_petugas       = '$petugas'
                  WHERE id_inventaris = '$id'";
        
        $hasil = $this->conn->query($query);
                  
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_inventaris.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');</script>";
        }                                    
    }    

}


?>