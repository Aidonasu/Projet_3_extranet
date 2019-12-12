<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Changement mot de passe</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  </head>
  <body class="accueil">
    <header>
      <a href="../index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
    </header>
    <main>
      <form class="" action="valid_change_password.php" method="post">
        <?php if (isset($_GET['error'])): ?>
        <p>Mauvais UserName !</p>
        <?php endif; ?>
        <div class="card border-primary mb-3">
          <div class="card-header">Changement du mot de passe</div>
          <?php
            $id = $_GET['id_user'];
            ?>
          <div class="card-body">
            <p class="card-text">
              <label for="user">Nouveau Password</label>
              <input class="form-input form-control" type="password" name="password" id="password" required>
              <label for="checkbox">
              <input type="checkbox" id="checkbox">
              Afficher le mot de passe
              </label>
            </p>
            <ul class="account center">
              <li><input type="submit" class="btn btn-primary" name="modifier" value="Modifier"></li>
              <li><a href="../index.php" class="btn btn-link">Annuler</a></li>
            </ul>
          </div>
        </div>
      </form>
    </main>
    <footer>
      <ul class="bg-dark text-white">
        <li><a href="../mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="../contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
    <script type="text/javascript" src="../js/reveal_code.js"></script>
  </body>
</html>
