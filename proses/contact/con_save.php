<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $email      = RemoveXSS($_POST['email']);
  $name       = RemoveXSS($_POST['name']);
  $address    = RemoveXSS($_POST['address']);
  $phone      = RemoveXSS($_POST['phone']);

  $query  = "INSERT INTO tbl_contact(email,nama,address,phone)VALUES('$email','$name','$address','$phone')";
  $result = mysqli_query($con,$query);
  if ($result){
    header('location:../../index.php?mod=contact');
  }else{
    echo 'Data tidak dapat disimpan';
  }

?>
