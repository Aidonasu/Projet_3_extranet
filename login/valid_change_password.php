<?php

$new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user = $_POST['id-user'];

require_once '../config-pdo.php';
require '../modele/pdoConnect.php';
$query = $pdo->prepare('UPDATE account set password = ? WHERE id_user=?');
$query->execute([$new_password,$user]);

header('Location:../index.php?sucess=2');
exit();


 ?>
