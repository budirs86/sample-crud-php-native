<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $name    = RemoveXSS($_POST['divisi']);
  $query  = "INSERT INTO tbl_divisi(name)VALUES('$name')";
  $result = mysqli_query($con,$query);

  header('location:../../index.php?mod=divisi');
?>
