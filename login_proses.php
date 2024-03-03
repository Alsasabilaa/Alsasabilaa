<?php
//aktifkan session
session_start();
//panggil koneksi database
include"koneksi.php";

$pass=md5($_POST['password']);
$username=mysqli_escape_string($koneksi,$_POST['username']);
$password=mysqli_escape_string($koneksi,$pass);
$query = "SELECT * FROM user where username='$username' and password='$pass' and status='aktif'";
$login=mysqli_query($koneksi, $query);
$data=mysqli_fetch_array($login);

//uji jika username dan password di temukan/sesuai
if($data){
    $_SESSION['id_user']=$data['id_user'];
    $_SESSION['username']=$data['username']; 
    $_SESSION['password']=$data['password'];
    $_SESSION['nama_pengguna']=$data['nama_pengguna'];
   
    //arahkan ke halaman admin
    header('location:index.php');

} else {
    echo"<script>
    alert('Maaf,Login Gagal,Pastikan Username dan Password anda benar...!');
    document.location='login.php';
    </script>";

}

?>