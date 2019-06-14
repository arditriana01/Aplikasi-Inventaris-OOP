<?php

include 'connect.php';

class Pegawai extends Connect
{
        
    // fungsi untuk menampilkan data dari tabel pegawai
    public function view()
    {
        $query = "SELECT * FROM pegawai ORDER BY id_pegawai DESC";

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
    // fungsi untuk menambahkan data untuk tabel pegawai
    public function insert($nama_pegawai, $nip, $password, $alamat)
    {
        $query = "INSERT INTO pegawai VALUES(NULL, '$nama_pegawai', '$nip',  '$password', '$alamat')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_pegawai.php';</script>";
        }
        return $hasil;
    }  
        
    // fungsi untuk menampilkan data untuk yang akan di update 
    public function view_edit($id)
    {
        $query = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";

        $hasil = $this->conn->query($query);

        $row = $hasil->fetch_array();
        $data[] = $row;
        return $data;
    }    
    
    // fungsi untuk mengupdate data untuk tabel pegawai
    public function update($id, $nama_pegawai, $nip, $password, $alamat)
    {
        $query = "UPDATE pegawai set nama_pegawai = '$nama_pegawai', 
                                     nip          = '$nip', 
                                     password     = '$password',
                                     alamat       = '$alamat'
                  WHERE id_pegawai = '$id' ";
        
        $hasil = $this->conn->query($query);
                  
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_pegawai.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');location.href='update_pegawai.php';</script>";
        }                                    
    }    
    
}

?>