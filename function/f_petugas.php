<?php

include 'connect.php';

class Petugas extends Connect
{
        
    // fungsi untuk menampilkan data dari tabel petugas beserta penggabungan 1 tabel
    public function view()
    {
        $query = "SELECT petugas.*, level.nama_level FROM petugas
                  INNER JOIN level on petugas.id_level = level.id_level
                  ORDER BY id_petugas DESC";

        $hasil = $this->conn->query($query);

        $rows = mysqli_num_rows($hasil);

        if($rows >= 1){

            while($row = $hasil->fetch_assoc()){
                $result[] = $row;
            }
            return $result;
        }
    }
    
    // fungsi untuk menambahkan data untuk tabel petugas
    public function insert($username, $password, $nama_petugas, $level)
    {
        $query = "INSERT INTO petugas VALUES(NULL, '$username', '$password', '$nama_petugas', '$level')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_petugas.php';</script>";
        }
        return $hasil;
    }  
    
    // fungsi untuk menampilkan data untuk yang akan di update 
    public function view_edit($id)
    {
        $query = "SELECT petugas.*, level.nama_level FROM petugas
                  INNER JOIN level on petugas.id_level = level.id_level WHERE id_petugas='$id'";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array())
        {
            $result[] = $row;
        }
        return $result;
    }    
    
    // fungsi untuk mengupdate data untuk tabel petugas
    public function update($id, $username, $password, $nama_petugas, $level)
    {
        $query = "UPDATE petugas set username   = '$username', 
                                   password     = '$password', 
                                   nama_petugas = '$nama_petugas',
                                   id_level     = '$level'
                  WHERE id_petugas = '$id' ";
        $hasil = $this->conn->query($query);

        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_petugas.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');</script>";
        }
    } 
 

}


?>