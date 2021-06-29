<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');
  $id     = RemoveXSS($_GET['id']);

  $query  = "DELETE FROM tbl_departement  WHERE md5(dept_id)='$id'";
  $result = mysqli_query($con,$query)or die(mysqli_error());

  if($result){
    header('location:../../index.php?mod=departemen');
  }else {
      header('location:../../index.php?mod=departemen');
  }

?>
