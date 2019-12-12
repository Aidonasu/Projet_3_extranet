<?php
  $user = htmlspecialchars($_POST['user']);

  /* connection à la base de données */
  require_once '../config-pdo.php';
  require '../modele/pdoConnect.php';
  $pdo->exec('SET NAMES UTF8');
  $query = $pdo->prepare("SELECT id_user,username FROM account where username=?");
  $query->execute([$user]);

  /*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
  if($results = $query->fetch(PDO::FETCH_ASSOC)){

    // Comparaison du pass envoyé via le formulaire avec la base
    //$isPasswordCorrect = password_verify($_POST['password'], $results['password']);

    if($user = $results['username']){
      sleep(1);
      $id = $results['id_user'];
     header("Location:secret_question.php?id_user=$id");
      exit();
    }
  }
  /*sinon renvoi a la page de connexion avec un message erreur*/
    else{
      header('Location:forgot_password.php?error');
    exit();
    }
  ?>
