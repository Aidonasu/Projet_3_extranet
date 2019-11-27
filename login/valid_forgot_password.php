<?php
   session_start();

   $user = htmlspecialchars($_POST['user']);

   var_dump($user);

   /* connection à la base de données */
   $pdo = new PDO('mysql:host=localhost;dbname=extranet-gbaf', 'root', 'f9m2zlri');
   $pdo->exec('SET NAMES UTF8');
   $query = $pdo->prepare("SELECT username,question FROM account where username=?");
   $query->execute([$user]);

/*On vérifie si les informations données sont corrects, si oui connexion on profil admin*/
   if($results = $query->fetch(PDO::FETCH_ASSOC)){

     // Comparaison du pass envoyé via le formulaire avec la base
     //$isPasswordCorrect = password_verify($_POST['password'], $results['password']);

     if($user = $results['username']){
       sleep(1);
      ?>
      <input type="text" name="question" value="<?=$results['question'];?>">
      <?php
       exit();
     }
   }
   /*sinon renvoi a la page de connexion avec un message erreur*/
     else{
       header('Location:forgot_password.php?error');
     exit();
     }
   ?>
