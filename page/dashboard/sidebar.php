<div class="sidebar" id="sidebar">
        <!-- =============================== LOGO PADA SIDEBAR =============================== -->
        <div class="logo-sidebar">
                <a href="../../views/main/dashboard.php" class="logo"><h4>INVENTARIS</h4></a>
        </div>
        <!-- =============================== LOGO PADA SIDEBAR =============================== -->


        <!-- =============================== MENU PADA SIDEBAR =============================== -->
        <ul class="nav-sidebar">
                <hr class="line">
               
                <li class="li-sidebar">
                        <a href="../../views/main/dashboard.php">Dashboard</a>
                </li>
                <hr class="line">

        <!-- =============================== MENU UNTUK ADMINISTRATOR =============================== -->
        <?php if ($_SESSION['level'] == 'administrator') {
                echo '
                <li class="li-sidebar">
                        <a href="../../views/ruang/view_ruang.php"> Ruang </a>
                </li>

                <li class="li-sidebar">
                        <a href="../../views/jenis/view_jenis.php"> Jenis </a>
                </li>

                <li class="li-sidebar">
                        <a href="../../views/inventaris/view_inventaris.php"> Inventaris </a>
                </li>
                <hr class="line">

                <li class="li-sidebar">
                        <a href="../../views/level/view_level.php"> Level </a>
                </li>

                <li class="li-sidebar">
                        <a href="../../views/petugas/view_petugas.php"> Petugas </a>
                </li>

                <li class="li-sidebar">
                        <a href="../../views/pegawai/view_pegawai.php"> Pegawai </a>
                </li>

                <!-- <li class="li-sidebar">
                        <a href="../../views/peminjam/view_peminjam.php"> Peminjam </a>
                </li> -->
                <hr class="line">

                <li class="li-sidebar">
                        <a href="../../views/peminjaman/view_peminjaman.php"> Peminjaman </a>
                </li>          
                
                <li class="li-sidebar">
                        <a href="../../views/main/pengembalian.php"> Pengembalian </a>
                </li>                
                <hr class="line">

                <li class="li-sidebar">
                        <a href="../../views/main/laporan.php"> Laporan </a>
                </li>
                <hr class="line">                
                ';
                // =============================== MENU UNTUK ADMINISTRATOR =============================== 
        
                
        // =============================== MENU UNTUK OPERATOR ===============================  
        }elseif ($_SESSION['level'] == 'operator') {
                echo '
                <li class="li-sidebar">
                        <a href="../../views/peminjaman/view_peminjaman.php"> Peminjaman </a>
                </li>

                <li class="li-sidebar">
                        <a href="../../views/main/pengembalian.php"> Pengembalian </a>
                </li>                
                <hr class="line">                
                ';
        }?>
                <li class="li-sidebar">
                        <a href="../../logout.php" onclick="return confirm('Yakin Logout Sebagai <?php echo $_SESSION['username']; ?> ?');"> Logout </a>
                </li>
        </ul>
</div>