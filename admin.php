<!--panggil file header -->
<?php include "header.php"; ?>

<?php
// Uji jika tombol simpan di klik
if (isset($_POST['simpan'])) {
    $tgl = date('Y-m-d');

    //htmlspecialchars agar inputan lebih aman dari injection
    $Nama = htmlspecialchars($_POST['Nama'], ENT_QUOTES);
    $Alamat = htmlspecialchars($_POST['Alamat'], ENT_QUOTES);
    $Tujuan = htmlspecialchars($_POST['Tujuan'], ENT_QUOTES);
    $Nohp = htmlspecialchars($_POST['Nohp'], ENT_QUOTES);

    //persiapan query simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tamu VALUES('', '$tgl', '$Nama', '$Alamat', '$Tujuan', '$Nohp')");

    //Uji jika simpan data sukses
    if ($simpan) {
        echo "<script>alert('simpan data sukses,Terimakasih..!');
        dokumen.location='?'</script>";
    } else {
        echo "<script>alert('simpan data GAGAL!!!');
        dokumen.location='?'</script>";
    }
}


?>
<!--head-->
<div class="head text-center">

    <h2 class="text-white">SISTEM INFORMASI BUKU TAMU
    </h2>
</div>
<!-- end head-->

<!--awal row-->

<div class="row">
    <!--col-lg-7-->
    <div class="col-lg-7 mb-3">
        <div class="card shadow bg-gradient-light">
            <!--card body-->
            <div class="card-body">


                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                </div>
                <form class="user" method="POST" action="">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="Nama" placeholder="Nama Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="Alamat" placeholder="Alamat Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="Tujuan" placeholder="Tujuan Pengunjung" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="Nohp" placeholder="No.hp Pengunjung" required>
                    </div>
                    <button type="sumbit" name="simpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>


                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="#">By.alsasabila|2024 - <?= date('Y') ?></a>
                </div>

            </div>
            <!--end-cad-body-->

        </div>

    </div>
    <!--end-col-lg-7-->

    <!--col-lg-5-->
    <div class="col-lg-5 mb-3">
        <!--card-->
        <div class="card shadow ">
            <!--card body-->
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                </div>
                <?php
                //deklarasi tanggal
                //menampilkan tanggal sekarang

                $tgl_sekarang = date('Y-m-d');

                //menampilkan tanggal kemarin
                $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                //mendapatkan 6 hari sebelum tgl sekarang
                $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));

                $sekarang = date('Y-m-d h:i:s');

                //persiapan query tampilkan jumlah data pengunjung
                $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                    $koneksi,
                    "SELECT count(*)FROM tamu where Tanggal like '%$tgl_sekarang%'"
                ));
                $kemarin = mysqli_fetch_array(mysqli_query(
                    $koneksi,
                    "SELECT count(*)FROM tamu where Tanggal like '%$kemarin%'"
                ));
                $seminggu = mysqli_fetch_array(mysqli_query(
                    $koneksi,
                    "SELECT count(*)FROM tamu where Tanggal BETWEEN '$seminggu'and'$sekarang'"
                ));

                $bulan_ini = date('m');

                $sebulan = mysqli_fetch_array(mysqli_query(
                    $koneksi,
                    "SELECT count(*) FROM tamu where month(tanggal) = '$bulan_ini'"
                ));
                $keseluruhan = mysqli_fetch_array(mysqli_query(
                    $koneksi,
                    "SELECT count(*) FROM tamu;"
                ));
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Hari ini</td>
                        <td>:<?= $tgl_sekarang[0] ?></td>
                    </tr>
                    <tr>
                        <td>Kemarin</td>
                        <td>:<?= $kemarin[0] ?></td>

                    </tr>
                    <tr>
                        <td>minggu ini</td>
                        <td>:<?= $seminggu[0] ?></td>
                    </tr>
                    <tr>

                        <td>Bulan ini </td>
                        <td>:<?= $sebulan[0] ?></td>

                    </tr>
                    <tr>
                        <td>Keseluruhan</td>
                        <td>:<?= $keseluruhan[0] ?></td>

                    </tr>

                </table>




            </div>
            <!--card body-->
        </div>
        <!--end card-->
    </div>
    <!-- end col-lg-5-->
</div>
<!--end row-->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini[<?= date('d-m-Y') ?>]</h6>
    </div>
    <div class="card-body">
        <a href="rekapitulasi.php" class="btn btn-primary mb-3"><i class="fa fa-table"></i>Rekapitulasi Pengunjung</a>
        <a href="Logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i>Logout</a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pengunjung</th>
                        <th>Alamat</th>
                        <th>Tujuan</th>
                        <th>No.hp Pengunjung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $tgl = date('Y-m-d'); //2024-01-24
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where Tanggal order by Id desc");
                    $no = 1;

                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['Tanggal'] ?></td>
                            <td><?= $data['Nama'] ?></td>
                            <td><?= $data['Alamat'] ?></td>
                            <td><?= $data['Tujuan'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $data['Id'] ?>" class="btn btn-warning">edit</a> <a href="hapus.php?id=<?= $data['Id'] ?> " class="btn btn-danger">hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- panggil file footer -->
<?php include "footer.php"; ?>