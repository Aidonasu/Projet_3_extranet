<?php
  session_start();

  $acteurs = htmlspecialchars($_POST['acteurs']);
  $user = $_SESSION['id_user'];
  $vote = 1;

  var_dump($acteurs,$vote,$user);

  require_once '../config-pdo.php';
  require '../modele/pdoConnect.php';  /* connection à la base de données */
  $pdo->exec('SET NAMES UTF8');
  $results_vote = $pdo->prepare("SELECT id_user,id_acteur FROM vote where id_user=? and id_acteur=?");
  $results_vote->execute([$user,$acteurs]);
  $results = $results_vote->fetch(PDO::FETCH_ASSOC);

  if ($results['id_user']) {
    header("Location:acteurs.php?acteurs=$acteurs&error=2");
  }
  else {
    $query = $pdo->prepare("INSERT INTO vote (id_user, id_acteur, vote_like, vote_dislike)
    VALUES(?,?,?,0)");

    $query->execute([$user,$acteurs,$vote]);

  header("Location:acteurs.php?acteurs=$acteurs");
  exit();
  }

  ?>
