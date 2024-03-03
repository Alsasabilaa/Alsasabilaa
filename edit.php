<?php
include"koneksi.php";
$id=$_GET['id'];
$pilih=mysqli_query($koneksi,"SELECT*FROM tamu WHERE id='$id'");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $Tanggal=$_POST['Tanggal'];
    $Nama=$_POST['Nama'];
    $Alamat=$_POST['Alamat'];
    $Tujuan=$_POST['Tujuan'];
    $Nohp=$_POST['Nohp'];

    $query=mysqli_query($koneksi,"UPDATE tamu SET Tanggal='$Tanggal', Nama='$Nama', Alamat='$Alamat', Tujuan='$Tujuan', no_hp='$Nohp' WHERE Id='$id'");
    if($query){
        header("location:admin.php");
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="containner">
    <div class="row">
        <div class="col-md-12">
        <h1>Data Tamu</h1>
        <form action="" method="post">
        <?php
         while ($data = mysqli_fetch_array($pilih)){
         ?>
         <div class="mb-3">
            <label for="Id" class="form-nama">id</label>
            <input type="text" id="id" name="Id" class="form-control"
            value="<?php echo $data['Id']?>">
         </div>
         <div class="mb-3">
            <label for="Tanggal" class="form-nama">Tanggal</label>
            <input type="text" id="Tanggal" name="Tanggal" class="form-control"
            value="<?php echo $data['Tanggal']?>">
         </div>
         <div class="mb-3">
            <label for="Nama" class="form-username">Nama</label>
            <input type="text" id="Nama" name="Nama" class="form-control"
            value="<?php echo $data['Nama']?>">
         </div>
         <div class="mb-3">
            <label for="Alamat" class="form-password">Alamat</label>
            <input type="text" id="Alamat" name="Alamat" class="form-control"
            value="<?php echo $data['Alamat']?>">
         </div>
         <div class="mb-3">
            <label for="Tujuan" class="form-password">Tujuan</label>
            <input type="text" id="Tujuan" name="Tujuan" class="form-control"
            value="<?php echo $data['Tujuan']?>">
         </div>
         <div class="mb-3">
            <label for="No-tlpn" class="form-password">No-tlpn</label>
            <input type="text" id="No-tlpn" name="Nohp" class="form-control"
            value="<?php echo $data['no_hp']?>">
         </div>
         <button type="sumbit" class="btn btn-primary">Simpan</button>
         <?php } ?>
</form>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>