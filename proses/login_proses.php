<?php
session_start();
require_once('../inc/koneksi.php');
require_once('../inc/fungsi.php');

 if(isset($_POST['btn-login']))
 {

  $email    = $_POST['user_email'];
  $password = SHA1($_POST['password']);

  $query  = "SELECT * FROM tbl_users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($con,$query)or die(mysqli_error());
  $num_row = mysqli_num_rows($result);
  $row     = mysqli_fetch_array($result);

  if( $num_row >=1 ) {

    echo "ok"; // log in
    $_SESSION['logged_in'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['user_level'] = $row['user_level'];
    $_SESSION['username'] = $row['email'];
    logme('Masuk Ke Sistem');
  }else {
    echo "alamat email atau password salah!.";
  }

 }

?>
