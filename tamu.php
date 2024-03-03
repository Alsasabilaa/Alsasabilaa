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

<div class="card">
    <div class="header">
        <div class="row">
            <div class="col-md-8">
                <h4 class="title">Data Tamu</h4>

            </div>
            <div class="col-md-4">
                <a href="?dashboard=tamu-add" class="btn btn-info btn-fill pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
            </div>
        </div>

    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Tanggal</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Tujuan</td>
                <td>no_hp</td>
                <td>AKSI</td>

            </tr>
            <?php if (isset($_GET['cari'])) : ?>
                <?php $cari = $_GET['cari'] ?>
                <?php $query = mysqli_query($koneksi, "select * FROM tamu where Nama like'%" . $cari . "%'"); ?>
            <?php else : ?>
                <?php $query = mysqli_query($koneksi, "SELECT * FROM tamu"); ?>
            <?php endif ?>
            <tbody>
                <?php while ($data = mysqli_fetch_array($query)) : ?>
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
                            <a href="tamu_hapus.php?id=<?php echo $data['Id'] ?>" onclick="return confirm('Yakin ingin menghapus Data Tamu ini')" class=" btn btn-danger btn-fill"><i class="pe-7s-trash"></i>Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
        </table>
        <div class="footer">

            <hr>

        </div>
    </div>
</div>