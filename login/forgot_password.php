<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Oubli mot de passe</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="accueil">
    <header>
      <a href="../index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
    </header>
    <main>
      <form class="" action="valid_forgot_password.php" method="post">
        <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-dark">
          <p>Mauvais UserName !</p>
        </div>
        <?php endif; ?>
        <div class="card border-primary mb-3">
          <div class="card-header">Récupération par nom d'utilisateur</div>
          <div class="card-body">
            <p class="card-text">
              <label for="user">UserName</label>
              <input class="form-input form-control" type="text" name="user" required>
            </p>
            <ul class="account center">
              <li><input type="submit" class="btn btn-primary" name="recherche" value="Rechercher"></li>
              <li><a href="../index.php" class="btn btn-link">Annuler</a></li>
            </ul>
          </div>
        </div>
      </form>
    </main>
    <footer>
      <ul class="bg-dark text-white">
        <li><a href="mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="#" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
    </footer>
  </body>
</html>
