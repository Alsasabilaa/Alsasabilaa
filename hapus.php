<?php
include"koneksi.php";
$id=$_GET['id'];
$query=mysqli_query($koneksi,"DELETE FROM tamu WHERE id='$id'");
if($query){
    header("location:admin.php");

}



?>