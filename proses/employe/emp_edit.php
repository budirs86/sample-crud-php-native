<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

$id         = RemoveXSS($_POST['id']);
$name       = RemoveXSS($_POST['name']);
$dep        = RemoveXSS($_POST['dep']);
$div        = RemoveXSS($_POST['div']);
$usr_level  = RemoveXSS($_POST['user_level']);


  $query  = "UPDATE tbl_users SET nama='$name',dep_id='$dep',div_id='$div',user_level='$usr_level' WHERE md5(id_user)='$id'";
  $result = mysqli_query($con,$query);

  if($result){
      header('location:../../index.php?mod=employe');
  }else {
      header('location:../../index.php?mod=employe&err=1');
  }

?>
