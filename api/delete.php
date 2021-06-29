<?php
header("Content-type:application/json");
require 'db_config.php';
$sql = "DELETE FROM tb_user WHERE user_id = '" . $_POST['user_id'] . "'";
$result = $mysqli->query($sql);
echo json_encode([$_POST['user_id']], JSON_PRETTY_PRINT);
 ?>
