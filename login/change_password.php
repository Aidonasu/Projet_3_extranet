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
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <img src="../logo/GBAF.png" alt="logo1">
    </header>
    <main>
      <form class="" action="valid_change_password.php" method="post">
        <?php if (isset($_GET['error'])): ?>
        <p>Mauvais UserName !</p>
        <?php endif; ?>
      <fieldset class="forgot">
         <legend>Changement du mot de passe</legend>
         <?php
          $id = $_GET['id_user'];
         ?>
           <p>
              <label for="user">Nouveau Password</label>
              <input class="form-input" type="password" name="password" id="password" required>
              <label for="checkbox">
                  <input type="checkbox" id="checkbox">
                  Afficher le mot de passe
              </label>
           </p>
           <p>
             <input type="hidden" name="id-user" value="<?=$id;?>">
           </p>

         <div class="center">
           <input type="submit" name="modifier" value="Modifier">
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
    <script type="text/javascript" src="../js/reveal_code.js"></script>
  </body>
</html>