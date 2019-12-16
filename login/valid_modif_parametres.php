<?php
  session_start();

  $nom = htmlspecialchars($_POST['nom']);
  $_SESSION['nom'] = $nom;

  $prenom = htmlspecialchars($_POST['prenom']);
  $_SESSION['prenom'] = $prenom;

  $username = htmlspecialchars($_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $question = htmlspecialchars($_POST['question']);
  $reponse = htmlspecialchars($_POST['reponse']);
  $id = $_POST['account'];

  if (empty($nom) || empty($prenom) || empty($username) || empty($password) || empty($question) || empty($reponse)) {
  sleep(1);
  header("Location:parametres.php?account=$id&error=2");
  exit();
  }
  else {
      require_once '../config-pdo.php';
      require '../modele/pdoConnect.php';
      $query = $pdo->prepare('UPDATE account set nom = ?, prenom = ?, username = ?, password = ?, question = ?, reponse = ? WHERE id_user=?');
      $query->execute([$nom,$prenom,$username,$password,$question,$reponse,$id]);

      header("Location:parametres.php?account=$id");
      exit();

  }
   ?>
