<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet3</title>
    <link rel="stylesheet" href="fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <img src="logo/GBAF.png" alt="logo1">
    </header>
    <main>
      <p name="sucess"><?php
         if (isset($_GET['sucess'])) {
           if ($_GET['sucess']==1) {
             echo 'Votre compte a bien été créer ! Félicitation !';
             sleep(1);
           }
         }?></p>
         <?php if (isset($_GET['error'])): ?>
         <p>Mauvais identifiants !</p>
         <?php endif; ?>
      <form class="" action="valid-connexion.php" method="post">
      <fieldset class="login">
         <legend>Connexion</legend>
         <p>Pour accéder aux information du site, renseignez votre UserName et votre Password</p>
         <div class="login-connexion">
           <p>
              <label for="">UserName :</label>
              <input type="text" name="login">
           </p>
           <p>
              <label for="">Password :</label>
              <input type="password" name="password">
           </p>
         </div>
         <div class="center">
           <input type="submit" name="connexion" value="Connexion">
         </div>
         <a href="login/forgot_password.php">Vous avez oublié votre mot de passe ?</a>
      </fieldset>
   </form>
   <br>
     <fieldset>
       <legend>Première visite sur ce site ?</legend>
       <p>Pour un accès complet à ce site, veuillez créer un compte utilisateur. </p>
       <a href="crea_compte.php">Créer un compte</a>
     </fieldset>
    </main>
    <footer>
      <ul>
        <li>Mentions légales</li>
        <li>Contact</li>
      </ul>
    </footer>
  </body>
</html>
