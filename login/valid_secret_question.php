<?php
  $reponse = htmlspecialchars($_POST['reponse']);
  $question = htmlspecialchars($_POST['question']);
  $iduser = $_POST['iduser'];

  /* connection à la base de données */
  require_once '../config-pdo.php';
  require '../modele/pdoConnect.php';
  $pdo->exec('SET NAMES UTF8');
  $query = $pdo->prepare("SELECT id_user,question,reponse FROM account where id_user=? and question=? and reponse=?");
  $query->execute([$iduser,$question,$reponse]);

  /*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
  if($results = $query->fetch(PDO::FETCH_ASSOC)){
    // Comparaison du pass envoyé via le formulaire avec la base
    //$isPasswordCorrect = password_verify($_POST['password'], $results['password']);

    if($question = $results['question'] && $reponse = $results['reponse']){
     header("Location:change_password.php?id_user=$iduser");
      exit();
    }
  }
  else {
    sleep(1);
    header("Location:secret_question.php?id_user=$iduser&error");
    exit();
  }
  ?>
