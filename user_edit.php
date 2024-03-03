<?php
include "koneksi.php";
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $nama = $_POST['nama'];
   $status = $_POST['status'];

   $sql = "UPDATE user SET username='$username', password='$password', nama_pengguna='$nama', status='$status' WHERE id_user='$id'";
   $query = mysqli_query($koneksi, $sql);
   if ($query) {
      echo "<script>window.location = 'index.php?dashboard=user&notif=edit-berhasil';</script>";
   }
}
?>

<div class="card m-4">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Menggubah Admin<?php echo $_GET['nama_pengguna'] ?></h4>
         </div>
         <div class="col-md-4">
            <a href="index.php?dashboard=admin" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>
   </div>
   <div class="content">
      <form action="" method="post">
         <?php while ($data = mysqli_fetch_array($pilih)) : ?>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>NAMA</label>
                     <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_pengguna'] ?>">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>USERNAME</label>
                     <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>password</label>
                     <input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>status</label>
                     <select name="status" id="" class="form-select">
                        <option value="aktif">aktif</option>
                        <option value="tidak-aktif">tidak aktif</option>
                     </select>
                  </div>
               </div>
            </div>
         <?php endwhile ?>
         <button type="submit" class="btn btn-info btn-fill pull-right">Edit Admin</button>
         <div class="clearfix"></div>
      </form>
   </div>
</div>