<?php
session_start();
include_once('../inc/koneksi.php');
include_once('../inc/fungsi.php');
logme('Log Out dari Sistem');
unset($_SESSION['logged_in']);
$_SESSION['nama'] = $row['nama'];
$_SESSION['user_level'] = $row['user_level'];
if(session_destroy())
{
  header("Location: ../index.php?mod=login");
}

?>
