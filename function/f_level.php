<?php

include 'connect.php';

class Level extends Connect
{

    // fungsi untuk menampilkan data dari tabel level
    public function view()
    {
        $query = "CALL lihatLevel";

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

    // fungsi untuk menambahkan data untuk tabel level
    public function insert($nama_level)
    {
        $query = "INSERT INTO level VALUES (NULL, '$nama_level')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_level.php';</script>";
        }
        return $hasil;
    }

    // fungsi untuk menampilkan data untuk yang akan di update 
    public function view_edit($id)
    {
        $query = "SELECT * FROM level WHERE id_level = '$id'";

        $hasil = $this->conn->query($query);

        $row = $hasil->fetch_array();
        $data[] = $row;
        return $data;
    }    

    // fungsi untuk mengupdate data untuk tabel level
    public function update($id, $nama_level)
    {
        $query = "UPDATE level set nama_level = '$nama_level'
                  WHERE id_level = '$id' ";
        
        $hasil = $this->conn->query($query);
                  
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_level.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');location.href='update_level.php';</script>";
        }                                    
    }        

}
?>