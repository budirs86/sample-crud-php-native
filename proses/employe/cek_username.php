<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $email      = RemoveXSS($_POST['email']);
  $sql = "select * from tbl_users where email = '$email'";
  $process = mysqli_query($con, $sql);
  $num = mysqli_num_rows($process);
  if($num == 0){
      echo "Username masih tersedia";
  }else{
      echo " Username tidak tersedia";
  }

?>
