<?php
session_start();
require_once('../../inc/koneksi.php');
require_once('../../inc/fungsi.php');

  $email      = RemoveXSS($_POST['email']);
  $pass       = RemoveXSS($_POST['pass']);
  $name       = RemoveXSS($_POST['name']);
  $dep        = RemoveXSS($_POST['dep']);
  $div        = RemoveXSS($_POST['div']);
  $usr_level  = RemoveXSS($_POST['user_level']);

/*
  echo $email.'<br>';
  echo $pass.'<br>';
  echo $name.'<br>';
  echo $dep.'<br>';
  echo $div.'<br>';
  echo $usr_level.'<br>';
  exit(); */
  $query  = "INSERT INTO tbl_users(email,password,nama,dep_id,div_id,user_level)VALUES('$email',SHA1('$pass'),'$name','$dep','$div','$usr_level')";
  $result = mysqli_query($con,$query);
  if ($result){
    header('location:../../index.php?mod=employe');
  }else{
    echo 'Data tidak dapat disimpan';
  }

?>
