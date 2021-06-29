<?php
header("Content-type:application/json");
require 'db_config.php';
$sql = "INSERT INTO tb_user (user_name,user_email,user_address) VALUES ('" . $_POST['user_name'] . "','" . $_POST['user_email'] . "','" . $_POST['user_address'] . "')";
$result = $mysqli->query($sql);
$sql = "SELECT * FROM tb_user Order by user_id desc LIMIT 1";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
echo json_encode($data, JSON_PRETTY_PRINT);
 ?>
