<?php

session_start();

$acteurs = htmlspecialchars($_POST['acteurs']);
$user = $_SESSION['id_user'];
$vote = 0;

$pdo = new PDO('mysql:host=localhost;dbname=extranet-gbaf', 'root', 'f9m2zlri');  /* connection à la base de données */
$pdo->exec('SET NAMES UTF8');

if ($vote == 0) {
  $vote = $vote+1;
  $query = $pdo->prepare("INSERT INTO vote (id_user, id_acteur, vote)
  VALUES(?,?,?)");

  $query->execute([$user,$acteurs,$vote]);
}
elseif ($vote == 1) {
  $vote = $vote-1;
  $query = $pdo->prepare("INSERT INTO vote (id_user, id_acteur, vote)
  VALUES(?,?,?)");

  $query->execute([$user,$acteurs,$vote]);
}


header("Location:acteurs.php?acteurs=$acteurs");
exit();
?>
