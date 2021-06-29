<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $name   = RemoveXSS($_POST['div_name']);
  $id     = RemoveXSS($_POST['div_id']);
  $query  = "UPDATE tbl_divisi SET name='$name' WHERE md5(div_id)='$id'";
  $result = mysqli_query($con,$query)or die(mysqli_error());

  if($result){
    header('location:../../index.php?mod=divisi');
  }else {
      header('location:../../index.php?mod=divisi');
  }

?>
