<?php

session_start();

$acteurs = htmlspecialchars($_POST['acteurs']);
$user = $_SESSION['id_user'];
$new_comment = htmlspecialchars($_POST['new_comment']);

require_once '../config-pdo.php';
require '../modele/pdoConnect.php';  /* connection à la base de données */
$pdo->exec('SET NAMES UTF8');
$query = $pdo->prepare("INSERT INTO post (id_user, id_acteur, date_add, post)
VALUES(?,?,now(),?)");

$query->execute([$user,$acteurs,$new_comment]);

header("Location:acteurs.php?acteurs=$acteurs");
exit();
?>