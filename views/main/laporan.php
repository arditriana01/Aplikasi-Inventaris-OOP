<?php 
    session_start();
    
    include '../../function/f_laporan.php';

    $laporan = new Laporan(); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>laporan | Inventaris</title>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../../assets/css/style.css" media="screen">
    <link rel="stylesheet" href="../../assets/css/print.css" media="print">
</head>
<body>

	<div class="navbar">
			
	</div>

	<!-- ================= navbar sidebar ================= -->
		<?php include '../../page/dashboard/sidebar.php'; ?>
	<!-- ========= end sidebar =========== -->

	<!-- ========= body ================= -->
    <div class="container">

        <div class="text-level" style="margin-top: 3%;" id="level">
	        <h4>LEVEL / <?php echo $_SESSION['level']; ?></h4>
        </div>

    <div class="section">
        <div class="text-table" id="text">
                <h4>Data Laporan</h4>
        </div>

        <hr class="line" id="line">


        <form method="post" action="">

        <div class="selected" id="selected">

            <div class="select-bulan">
                <select name="bulan" style="font-size: 17px; padding: 14px;">
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>    
            </div>  

            <div class="btn-input" style="margin-top: 2.5%;" id="btn"> 
                <input type="submit" value="CARI" name="submit" class="btn btn-red">
            </div>

        </div>

        </form>

        <div class="text-laporan" id="text-laporan">
            <h2>DATA LAPORAN</h2> <h4>PENGEMBALIAN BARANG</h4>
        </div>

        <div class="table table-responsive">
                
                <table class="table-border" style="width: 100%" id="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE BARANG</th>
                            <th>NAMA BARANG</th>
                            <th>PEMINJAM</th>
                            <th>JUMLAH PINJAMAN</th>
                            <th>TANGGAL PINJAM</th>
                            <th>TANGGAL KEMBALI</th>
                        </tr>
                    </thead>

                    <?php               

                        if(isset($_POST['bulan']))
                        {
                            $bulan = $_POST['bulan'];
                            $no = 1;
                            $l = $laporan->viewBulan($bulan); 
                            if($l < 1) {                                                                                                                                                                                              
                                echo "<td colspan='10'>Untuk Bulan Ini Belum Ada Data</td>";
                            }else if($l > 1){						
                            foreach($l as $row){
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['kode_inventaris']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row['jumlah']; ?></td>
                                <td><?php echo $row['tanggal_pinjam']; ?></td>
                                <td><?php echo $row['tanggal_kembali']; ?></td>
                            </tr>
                        </tbody>                    
                        <?php } } ?>
                    <?php }else{?>

                    <?php

                        // deklarasi variabel no
                        $no = 1;
                        $l = $laporan->view(); 
                        if($l < 1) {                                                                                                                                                                                              
                            echo "<td colspan='10'>Untuk Bulan Ini Belum Ada Data</td>";
                        }else if($l > 1){						
                        foreach($l as $row){
                    ?>

                <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['kode_inventaris']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['nama_pegawai']; ?></td>
                            <td><?php echo $row['jumlah']; ?></td>
                            <td><?php echo $row['tanggal_pinjam']; ?></td>
                            <td><?php echo $row['tanggal_kembali']; ?></td>

                        </tr>
                    </tbody>                    
                        <?php } } }?>
                </table>

        </div>

        <div style="margin-left:40%;" id="btn">
            <button onClick="window.print();" class="btn btn-black" style="width: 25%;">PRINT</button>
        </div>

</div>

</div>
	<!-- ============ end body =============== -->

</body>
</html>