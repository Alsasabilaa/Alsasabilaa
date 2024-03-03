<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $Tanggal = $_POST['Tanggal'];
   $Nama = $_POST['Nama'];
   $Alamat = $_POST['Alamat'];
   $Tujuan = $_POST['Tujuan'];
   $no_hp = $_POST['no_hp'];
   $sql = "INSERT INTO tamu VALUES ('', '$Tanggal', '$Nama', '$Alamat', '$Tujuan', '$no_hp')";
   $query = mysqli_query($koneksi, $sql);
   if ($query) {
      echo "<script>window.location = '?dashboard=tamu&notif=add-berhasil';</script>";
   }
}
?>
<div class="card">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Menambah Data Tamu</h4>
         </div>
         <div class="col-md-4">
            <a href="?dashboard=tamu" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post">
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="Tanggal" value="<?php echo date('Y-m-d') ?>">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="Nama">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="Alamat">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>Tujuan</label>
                  <input type="text" class="form-control" name="Tujuan">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>no_hp</label>
                  <input type="text" class="form-control" name="no_hp">
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-info btn-fill pull-right">Tambah tamu</button>
         <div class="clearfix"></div>
      </form>
   </div>
</div>