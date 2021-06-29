<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $name   = RemoveXSS($_POST['dep_name']);
  $id     = RemoveXSS($_POST['dept_id']);
  $query  = "UPDATE tbl_departement SET name='$name' WHERE md5(dept_id)='$id'";
  $result = mysqli_query($con,$query)or die(mysqli_error());

  if($result){
    header('location:../../index.php?mod=departemen');
  }else {
      header('location:../../index.php?mod=departemen');
  }

?>
