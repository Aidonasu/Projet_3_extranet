<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet3</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <header>
      <img src="../logo/GBAF.png" alt="logo1">
    </header>
    <main>
      <form class="" action="valid_forgot_password.php" method="post">
        <?php if (isset($_GET['error'])): ?>
        <p>Mauvais UserName !</p>
        <?php endif; ?>
      <fieldset class="login">
         <legend>Récupération par nom d'utilisateur</legend>
         <div class="login-connexion">
           <p>
              <label for="user">UserName :</label>
              <input type="text" name="user">
           </p>
         </div>
         <div class="center">
           <input type="submit" name="recherche" value="Rechercher">
         </div>
      </fieldset>
   </form>
    </main>
    <footer>
      <ul>
        <li>Mentions légales</li>
        <li>Contact</li>
      </ul>
    </footer>
  </body>
</html>
