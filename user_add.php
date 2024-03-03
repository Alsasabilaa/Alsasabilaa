<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_user = $_POST['id_user'];
   $username = $_POST['username'];
   $password = md5($_POST['password']);
   $nama_pengguna = $_POST['nama_pengguna'];
   $status = $_POST['status'];
   $sql = "INSERT INTO user VALUES ('', '$username', '$password', '$nama_pengguna', '$status')";
   $query = mysqli_query($koneksi, $sql);
   if ($query) {
      echo "<script>window.location = '?dashboard=user&notif=add-berhasil';</script>";
   }
}
?>
<div class="card">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Menambah Admin</h4>
         </div>
         <div class="col-md-4">
            <a href="index.php?dashboard=user" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post">
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>username</label>
                  <input type="text" class="form-control" name="username">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>password</label>
                  <input type="text" class="form-control" name="password">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>nama_pengguna</label>
                  <input type="text" class="form-control" name="nama_pengguna">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>status</label>
                  <input type="text" class="form-control" name="status">
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-info btn-fill pull-right">Tambah</button>
         <div class="clearfix"></div>
      </form>
   </div>
</div>