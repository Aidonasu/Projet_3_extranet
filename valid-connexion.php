<?php
   session_start();

   $login = htmlspecialchars($_POST['login']);
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   /* connection à la base de données */
   $pdo = new PDO('mysql:host=localhost;dbname=extranet-gbaf', 'root', 'f9m2zlri');
   $pdo->exec('SET NAMES UTF8');
   $query = $pdo->prepare("SELECT * FROM account where username=? and password=?");
   $query->execute([$login,$password]);

/*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
   if($results = $query->fetch(PDO::FETCH_ASSOC)){
     if($results['id_user']){
       sleep(1);
       $_SESSION['prenom'] = $results['prenom'];
       $_SESSION['nom'] = $results['nom'];
       $_SESSION['id_user'] = $results['id_user'];
       header('Location:login/index.php');
       exit();
     }
   }
   /*sinon renvoi a la page de connexion avec un message erreur*/
     else{
     header('Location:index.php?error');
     exit();
     }

   ?>
