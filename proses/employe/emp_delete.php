<?php
  session_start();
  require_once('../../inc/koneksi.php');
  require_once('../../inc/fungsi.php');
  $id     = RemoveXSS($_GET['id']);
  $query  = "DELETE FROM tbl_users  WHERE md5(id_user)='$id'";
  $result = mysqli_query($con,$query);

  if($result){
    header('location:../../index.php?mod=employe');
  }else {
      header('location:../../index.php?mod=employe');
  }

?>
