<?php
include_once('DB.php');

$currentid = $_POST['current_id'];
$result2 = $mysqli->query("INSERT INTO `users` (login, email, password, admin) VALUES ('".$login."', '".$email."', '".$password."', '".$nol."')");

?>