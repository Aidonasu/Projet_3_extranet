<?php
  session_start();

  if (!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])){
  header('Location:index.php');
  exit();
  }
  else { ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Mentions légales</title>
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
      <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
    </header>
    <main>
      <div class="card border-primary mb-3">
        <div class="card-header">Mentions légales</div>
        <div class="card-body">
          <p class="card-title">Les données personnelles sécurisées figurant sur ce site internet concernent les utilisateurs. GBAF ne collecte aucune donnée personnelle directement sur le site internet, ni cookie.</p>
          <p class="card-text">Les utilisateurs ne peuvent accéder qu'aux seulles informations les concernants.</p>
          <p class="card-text">Pour optimiser la confidentialité de vos consultations, nous vous conseillons de choisir un mot de passe sécurisé.</p>
          <p class="card-text">Toute personne pourra exercer ses droits de retrait, de rectification ou de portabilité des données la concernant dans le cadre de la RGPD, en s'adressant à l'administrateur du site via la page de contact</p>
        </div>
        <div class="center">
          <a class="btn btn-primary" href="index.php">Retour</a>
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
    <script type="text/javascript" src="js/reveal_code.js"></script>
  </body>
</html>
<?php }
  ?>
