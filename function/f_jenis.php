<?php
include 'connect.php';

class Jenis extends Connect
{
        
    // fungsi untuk menampilkan data dari tabel jenis
    public function view()
    {
        $query = "SELECT * FROM jenis ORDER BY id_jenis DESC";

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

    // fungsi untuk menambahkan data untuk tabel jenis
    public function insert($nama_jenis, $kode_jenis, $keterangan)
    {
        $query = "INSERT INTO jenis VALUES (NULL, '$nama_jenis', '$kode_jenis', '$keterangan')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_jenis.php';</script>";
        }
        return $hasil;
    }
    
    // fungsi untuk menampilkan data untuk yang akan di update l
    public function view_edit($id)
    {
        $query = "SELECT * FROM jenis WHERE id_jenis = '$id'";

        $hasil = $this->conn->query($query);

        $row = $hasil->fetch_array();
        $data[] = $row;
        return $data;
    }    
    
    // fungsi untuk mengupdate data untuk tabel jenis
    public function update($id, $nama_jenis, $kode_jenis, $keterangan)
    {
        $query = "UPDATE jenis set nama_jenis = '$nama_jenis', 
                                   kode_jenis = '$kode_jenis', 
                                   keterangan = '$keterangan'
                  WHERE id_jenis = '$id' ";
        
        $hasil = $this->conn->query($query);
                  
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_jenis.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');location.href='update_jenis.php';</script>";
        }                                    
    }

}

?>