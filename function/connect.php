<?php

class Connect
{
        
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db   = 'inventaris';
        
    protected $conn;
        
    function __construct()
    {

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    // fungsi untuk login admin & operator
    public function login($username,$password){
        $query = mysqli_query($this->conn,"SELECT petugas.*, level.nama_level FROM petugas
                                           INNER JOIN level on petugas.id_level = level.id_level 
                                           WHERE petugas.username ='$username' AND 
                                                 petugas.password ='$password' ");

        $row = $query->num_rows;
        if ($row == 1) {
            $data = $query->fetch_array();
            // session
            $_SESSION['level']        = $data['nama_level'];
            $_SESSION['username']     = $data['username'];
            $_SESSION['password']     = $data['password'];
            $_SESSION['nama_petugas'] = $data['nama_petugas'];

            if ($_SESSION['level'] == 'administrator') {
                echo "<script>alert('Selamat Datang');location.href='views/main/dashboard.php';</script>";
            }
            if ($_SESSION['level'] == 'operator') {
                echo "<script>alert('Selamat Datang');location.href='views/main/dashboard.php';</script>";
            }
        }     
    }

    // fungsi untuk login pegawai
    public function login_pegawai($nip,$password){
        $query = mysqli_query($this->conn,"SELECT * FROM pegawai
                                           WHERE nip      ='$nip' AND 
                                                 password ='$password' ");

        $row = $query->num_rows;
        if ($row == 1) {
            $data = $query->fetch_array();
            // session
            $_SESSION['id_pegawai']   = $data['id_pegawai'];
            $_SESSION['nama_pegawai'] = $data['nama_pegawai'];
            $_SESSION['nip']          = $data['nip'];
            $_SESSION['password']     = $data['password'];
            $_SESSION['alamat']       = $data['alamat'];

            echo "<script>alert('Selamat Datang');location.href='views/peminjaman/peminjam.php';</script>";
        }     
    }

    // fungsi untuk register petugas
    public function register($username, $password, $nama_petugas, $level)
    {
        $query = "INSERT INTO petugas VALUES(NULL, '$username', '$password', '$nama_petugas', '$level')";

        $hasil = $this->conn->query($query);

        return $hasil;
    }    

    // fungsi untuk register peminjam
    public function register_pegawai($nama_pegawai, $nip, $password, $alamat)
    {
        $query = "INSERT INTO pegawai VALUES(NULL, '$nama_pegawai', '$nip', '$password', '$alamat')";

        $hasil = $this->conn->query($query);

        return $hasil;
    } 

    // fungsi untuk hapus data
    public function delete_data($table, $id, $id_values)
    {
        $query = "DELETE FROM $table WHERE $id = '".$id_values."' ";
        $hasil = $this->conn->query($query);
        if ($hasil) {
            return true;
        }else{
            return false;
        }
    }    

}

?>