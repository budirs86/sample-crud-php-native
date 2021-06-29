<?php
/*
Project       : Crud Sample
Autor         : Budi Rasuli Setiawan
Methode       : Native Non OOP
Date          : 27 Juni 2021
*/

session_start();
if (empty($_SESSION['logged_in'])){
      header("location:pages/login/login.php");
}
//start
include_once('inc/koneksi.php');
include_once('inc/fungsi.php');
$tahun=date('Y');
$bulan=date('m');
//anti xss
$menu=RemoveXSS($_GET['mod']);

switch ($menu) {
  case 'home':
    include_once("home.php");
    break;
  case 'departemen':
    include_once("pages/departement/departement.php");
    break;
  case 'divisi':
    include_once("pages/divisi/divisi.php");
    break;
    case 'employe':
      include_once("pages/employe/employe.php");
      break;
    case 'profile':
      include_once("pages/users/profile.php");
    break;
    case 'contact':
      include_once("pages/contact/contact.php");
    break;
    case 'project':
      include_once("pages/users/project.php");
    break;
    case 'order':
      include_once("pages/users/order.php");
    break;

    case 'log';
      include_once("pages/users/logfile.php");
    break;
  default:
    include_once("home.php");
    break;
}

?>
