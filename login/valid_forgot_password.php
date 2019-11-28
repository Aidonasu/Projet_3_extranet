<?php

   $user = htmlspecialchars($_POST['user']);
   $reponse = htmlspecialchars($_POST['reponse']);
   $question = htmlspecialchars($_POST['question']);

   /* connection à la base de données */
   $pdo = new PDO('mysql:host=localhost;dbname=extranet-gbaf', 'root', 'f9m2zlri');
   $pdo->exec('SET NAMES UTF8');
   $query = $pdo->prepare("SELECT id_user,username,question,reponse FROM account where username=? and question=? and reponse=?");
   $query->execute([$user,$question,$reponse]);

/*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
   if($results = $query->fetch(PDO::FETCH_ASSOC)){

     // Comparaison du pass envoyé via le formulaire avec la base
     //$isPasswordCorrect = password_verify($_POST['password'], $results['password']);

     if($user = $results['username'] || $question = $results['question'] || $reponse = $results['reponse']){
       sleep(1);
       $id = $results['id_user'];
      header("Location:change_password.php?id_user=$id");
       exit();
     }
   }
   /*sinon renvoi a la page de connexion avec un message erreur*/
     else{
       header('Location:forgot_password.php?error');
     exit();
     }
   ?>
