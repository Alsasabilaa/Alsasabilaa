<?php
include "koneksi.php";
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tamu WHERE Id='$id'");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $Tanggal = $_POST['Tanggal'];
   $Nama = $_POST['Nama'];
   $Alamat = $_POST['Alamat'];
   $Tujuan = $_POST['Tujuan'];
   $no_hp = $_POST['no_hp'];
   $sql = "UPDATE tamu SET Tanggal='$Tanggal', Nama='$Nama', Alamat='$Alamat', Tujuan='$Tujuan', no_hp='$no_hp' WHERE Id='$id'";
   $query = mysqli_query($koneksi, $sql);
   if ($query) {
      echo "<script>window.location = 'index.php?dashboard=tamu&notif=edit-berhasil';</script>";
   }
}
?>

<div class="card m-4">
   <div class="header">
      <div class="row">
         <div class="col-md-8">
            <h4 class="title">Mengubah Tamu<?php echo $_GET['Nama'] ?></h4>
         </div>
         <div class="col-md-4">
            <a href="index.php?dashboard=tamu" class="btn btn-info btn-fill pull-right"> <i class="pe-7s-angle-left"> Kembali </i></a>
         </div>
      </div>

   </div>
   <div class="content">
      <form action="" method="post">
         <?php while ($data = mysqli_fetch_array($pilih)) : ?>
            <div class="content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="Tanggal" value="<?php echo $data['Tanggal'] ?>" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="Nama" value="<?php echo $data['Nama'] ?>" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="Alamat" value="<?php echo $data['Alamat'] ?>">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" class="form-control" name="Tujuan" value="<?php echo $data['Tujuan'] ?>">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>no_hp</label>
                        <input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp'] ?>">
                     </div>
                  </div>
               </div>
            <?php endwhile ?>
            <button type="submit" class="btn btn-info btn-fill pull-right">Edit Tamu</button>
            <div class="clearfix"></div>
      </form>
   </div>
</div>