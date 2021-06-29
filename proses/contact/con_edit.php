<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

$id         = RemoveXSS($_POST['id']);
$email      = RemoveXSS($_POST['email']);
$name       = RemoveXSS($_POST['name']);
$address    = RemoveXSS($_POST['address']);
$phone      = RemoveXSS($_POST['phone']);



  $query  = "UPDATE tbl_contact SET nama='$name',email='$email',address='$address',phone='$phone' WHERE md5(id_user)='$id'";
  $result = mysqli_query($con,$query);

  if($result){
      header('location:../../index.php?mod=contact');
  }else {
      header('location:../../index.php?mod=contact&err=1');
  }

?>
