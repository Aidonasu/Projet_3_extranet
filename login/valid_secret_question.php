<?php

   $reponse = htmlspecialchars($_POST['reponse']);
   $question = htmlspecialchars($_POST['question']);

   /* connection à la base de données */
   require_once '../config-pdo.php';
   require '../modele/pdoConnect.php';
   $pdo->exec('SET NAMES UTF8');
   $query = $pdo->prepare("SELECT id_user,question,reponse FROM account where question=? and reponse=?");
   $query->execute([$question,$reponse]);

/*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
   if($results = $query->fetch(PDO::FETCH_ASSOC)){
     // Comparaison du pass envoyé via le formulaire avec la base
     //$isPasswordCorrect = password_verify($_POST['password'], $results['password']);

     if($question = $results['question'] || $reponse = $results['reponse']){
       sleep(1);
       $id = $results['id_user'];
      header("Location:change_password.php?id_user=$id");
       exit();
     }
   }
?>
