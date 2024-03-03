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
            <div class="col-md-8">
                <h4 class="title">DATA ADMIN</h4>

            </div>
            <div class="col-md-4">
                <a href="index.php?dashboard=user-add" class="btn btn-info btn-fill pull-right"> Tambah <i class="pe-7s-next-2"></i></a>
            </div>
        </div>

    </div>
    <div class="content">
        <table class="table">
            <tr>
                <td>id_user</td>
                <td>username</td>
                <td>password</td>
                <td>nama_pengguna</td>
                <td>status</td>
                <td>AKSI</td>

            </tr>
            <?php if (isset($_GET['cari'])) : ?>
                <?php $cari = $_GET['cari'] ?>
                <?php $query = mysqli_query($koneksi, "select * FROM user where id_user like'%" . $cari . "%'"); ?>
            <?php else : ?>
                <?php $query = mysqli_query($koneksi, "SELECT * FROM user"); ?>
            <?php endif ?>
            <tbody>
                <?php while ($data = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td>
                            <?php echo $data['id_user'] ?>
                        </td>
                        <td>
                            <?php echo $data['username'] ?>
                        </td>
                        <td>
                            <?php echo $data['password'] ?>
                        </td>
                        <td>
                            <?php echo $data['nama_pengguna'] ?>
                        </td>
                        <td>
                            <?php echo $data['status'] ?>
                        </td>
                        <td>
                            <a href="?dashboard=user-edit&id=<?php echo $data['id_user'] ?>&nama_pengguna=<?php echo $data['nama_pengguna'] ?>" class="btn btn-primary btn-fill"><i class="pe-7s-note"></i>edit</a>
                            <a href="user_hapus.php?id=<?php echo $data['id_user'] ?>" onclick="return confirm('Yakin ingin menghapus Data Admin ini')" class=" btn btn-danger btn-fill"><i class="pe-7s-trash"></i>hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
        </table>
        <div class="footer">
        </div>
    </div>
</div>