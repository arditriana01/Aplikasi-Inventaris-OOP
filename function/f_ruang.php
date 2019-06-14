<?php

include 'connect.php';

class Ruang extends Connect
{
    public function view()
    {
        $query = "CALL lihatRuang";

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
    
    public function insert($nama_ruang, $kode_ruang, $keterangan)
    {
        $query = "INSERT INTO ruang VALUES(NULL, '$nama_ruang', '$kode_ruang', '$keterangan')";

        $hasil = $this->conn->query($query);
        if ($hasil) {
            echo "<script>alert('Data Berhasil di Tambah');location.href='view_ruang.php';</script>";
        }
        return $hasil;
    }

    public function view_edit($id)
    {
        $query = "SELECT * FROM ruang WHERE id_ruang = '$id'";

        $hasil = $this->conn->query($query);

        while($row = $hasil->fetch_array())
        {
            $result[] = $row;
        }
        return $result;
    }    

    public function update($id, $nama_ruang, $kode_ruang, $keterangan)
    {
        $query = "UPDATE ruang set nama_ruang = '$nama_ruang', 
                                   kode_ruang = '$kode_ruang', 
                                   keterangan = '$keterangan'
                  WHERE id_ruang = '$id' ";
        $hasil = $this->conn->query($query);

        if ($hasil) {
            echo "<script>alert('Data Berhasil di Edit');location.href='view_ruang.php';</script>";
        }
        else{
            echo "<script>alert('Data Gagal di Edit');location.href='update_ruang.php';</script>";
        }
    }
}

?>