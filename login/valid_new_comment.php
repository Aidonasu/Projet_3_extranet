<?php

session_start();

$acteurs = htmlspecialchars($_POST['acteurs']);
$user = $_SESSION['id_user'];
$new_comment = htmlspecialchars($_POST['new_comment']);

require_once '../config-pdo.php';
require '../modele/pdoConnect.php';  /* connection à la base de données */
$pdo->exec('SET NAMES UTF8');

$comment = $pdo->prepare("SELECT id_user,id_acteur FROM post where id_user=? and id_acteur=?");
$comment->execute([$user,$acteurs]);
$results = $comment->fetch(PDO::FETCH_ASSOC);

if ($results['id_user']) {
  header("Location:acteurs.php?acteurs=$acteurs&error=1");
}
else {
  $query = $pdo->prepare("INSERT INTO post (id_user, id_acteur, date_add, post)
  VALUES(?,?,now(),?)");

  $query->execute([$user,$acteurs,$new_comment]);

  header("Location:acteurs.php?acteurs=$acteurs");
  exit();
}

?>
