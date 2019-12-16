<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Connexion</title>
    <link rel="stylesheet" href="fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  </head>
  <body class="accueil">
    <header>
      <a href="index.php"><img src="logo/GBAF.png" alt="logo1"></a>
    </header>
    <main>
      <p><?php
        if (isset($_GET['success'])) {
          if ($_GET['success']==1) {?>
      <div class="alert alert-dark">
        <p>Votre compte a bien été créer ! Vous pouvez vous connecter !</p>
      </div>
      <?php
        }
        elseif ($_GET['success']==2) {?>
      <div class="alert alert-dark">
        <p>Vote mot de passe a été modifié !</p>
      </div>
      <?php
        }
        }
      if (isset($_GET['error'])): ?>
      <div class="alert alert-dark">
        <p>Mauvais identifiants !</p>
      </div>
      <?php endif;
      if (isset($_GET['connectorcreate'])): ?>
      <div class="alert alert-dark">
        <p>Pour accéder à cette page, connectez-vous ou créer un compte, merci !</p>
      </div>
      <?php endif;?>
      <form class="" action="valid-connexion.php" method="post">
        <div class="card border-primary mb-3">
          <div class="card-header">Connexion</div>
          <div class="card-body">
            <p class="card-title">Pour accéder aux information du site, renseignez votre UserName et votre Password</p>
            <p class="card-text">
              <label for="login">UserName</label>
              <input class="form-input form-control" type="text" id="login" name="login" required>
            </p>
            <p class="card-text">
              <label for="password">Password</label>
              <input class="form-input form-control" type="password" name="password" id="password" required>
              <label for="checkbox">
              <input type="checkbox" id="checkbox">
              Afficher le mot de passe
              </label>
            </p>
          </div>
          <div class="center">
            <input class="btn btn-primary" type="submit" name="connexion" value="Connexion">
          </div>
          <a class="btn btn-link" href="login/forgot_password.php">Vous avez oublié votre mot de passe ?</a>
        </div>
      </form>
      <div class="card border-primary mb-3">
        <div class="card-header">Première visite sur ce site ?</div>
        <div class="card-body">
          <p class="card-title">Pour un accès complet à ce site, veuillez créer un compte utilisateur.</p>
        </div>
        <div class="center">
          <a class="btn btn-primary" href="crea_compte.php">Créer un compte</a>
        </div>
      </div>
      <div class="push"></div>
    </main>
    <footer>
      <ul class="bg-dark text-white">
        <li><a href="mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
    <script src="js/reveal_code.js"></script>
  </body>
</html>
