<?php include 'koneksi.php' ?>

<!-- NOTIFIKASI -->

<?php if (isset($_GET['notif'])) : ?>
    <?php if ($_GET['notif'] == "add-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Ditambahkan !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "edit-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Diedit !</span>
        </div>
    <?php endif; ?>
    <?php if ($_GET['notif'] == "delete-berhasil") : ?>
        <div class="alert alert-success">
            <span><b> Success - </b> Data Berhasil Dihapus !</span>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- NOTIFIKASI -->

<div class="card p-4">
    <div class="header">
        <div class="row">
            <div class="col-md-4">
                <h4 class="title">Rekap Data Tamu</h4>
            </div>
            <div class="col-md-6">
                <form method="get" action="">
                    <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" placeholder="First name" name="tgl1">
                            <input type="hidden" class="form-control" placeholder="First name" name="dashboard" value="rekap">
                            <input type="hidden" class="form-control" placeholder="First name" name="cari">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Last name" name="tgl2">
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success" value="Tampilkan">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-2">
                <div class="col">
                    <a href="index.php?dashboard=tamu" class="btn btn-primary">
                        << Kembali </a>
                            <a href="exportexcel_today.php" class="btn btn-primary">
                                Export Data Hari Ini </a>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_GET['cari'])) : ?>
        <?php $tgl1 = $_GET['tgl1']; ?>
        <?php $tgl2 = $_GET['tgl2']; ?>
        <?php if (empty($tgl1) and empty($tgl2)) : ?>
            <div class="text-center">
                pastikan tanggal diisi
            </div>
        <?php else : ?>
            <?php $no = 1; ?>
            <div class="content text-center">
                <table class="table">
                    <tr>
                        <td>id</td>
                        <td>Tanggal</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Tujuan</td>
                        <td>no_hp</td>
                        <td>AKSI</td>

                    </tr>
                    <?php $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where Tanggal BETWEEN '$tgl1' and '$tgl2'"); ?>
                    <?php while ($data = mysqli_fetch_array($tampil)) : ?>
                        <tr>
                            <td>
                                <?php echo $data['Id'] ?>
                            </td>
                            <td>
                                <?php echo $data['Tanggal'] ?>
                            </td>
                            <td>
                                <?php echo $data['Nama'] ?>
                            </td>
                            <td>
                                <?php echo $data['Alamat'] ?>
                            <td>
                                <?php echo $data['Tujuan'] ?>
                            </td>
                            <td>
                                <?php echo $data['no_hp'] ?>
                            </td>
                            </td>
                            <td>
                                <a href="?dashboard=tamu-edit&id=<?php echo $data['Id'] ?>&Nama=<?php echo $data['Nama'] ?>" class="btn btn-primary btn-fill"><i class="pe-7s-note"></i>Edit</a>
                                <a href="tamu_hapus.php?id=<?php echo $data['Id'] ?>" onclick=" return confirm('Yakin ingin menghapus Data Tamu ini')" class="btn btn-danger btn-fill"><i class="pe-7s-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>

                <a href="exportexcel.php?tanggala=<?php echo $tgl1 ?>&tanggalb=<?php echo $tgl2 ?>" class="btn btn-primary">Export data excel</a>

            </div>
        <?php endif ?>
    <?php endif ?>
</div>