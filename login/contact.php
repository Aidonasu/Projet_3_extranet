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
    <title>GBAF - Contact</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="accueil">
    <header>
      <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
      <ul class="head_ul alert bg-dark">
        <li class="text-white"><i class="fas fa-user"></i> <?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?></li>
        <li><a href="parametres.php?account=<?=$_SESSION['id_user'];?>" class="text-white"><i class="fas fa-cog"></i>Paramètres du compte</a></li>
        <li class="text-white"><a href="deconnexion.php" class="text-white"><i class="fas fa-university"></i>Deconnexion</a></li>
      </ul>
    </header>
    <main>
      <?php if (isset($_GET['success'])): ?>
      <div class="alert alert-dark">
        <p>Votre mail a bien été envoyé !</p>
      </div>
      <?php endif; ?>
      <form class="" action="valid_contact.php" method="post">
        <div class="card border-primary mb-3">
          <div class="card-header">Nous contacter</div>
          <div class="card-body">
            <p class="card-text">
              <label for="nom">Votre nom (obligatoire)</label>
              <input class="form-input form-control" type="text" name="nom" value="<?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?>"required>
            </p>
            <p class="card-text">
              <label for="mail">Votre mail (obligatoire)</label>
              <input class="form-input form-control" type="email" name="mail" required>
            </p>
            <p class="card-text">
              <label for="objet">Objet</label>
              <input class="form-input form-control" type="text" name="objet">
            </p>
            <div class="form-group">
              <label for="message">Votre message</label>
              <textarea class="form-control" id="exampleTextarea" rows="3" name="message"></textarea>
            </div>
            <ul class="account center">
              <li><input id="submit" type="submit" class="btn btn-primary" value="Envoyer"></li>
              <li><a href="index.php" class="btn btn-link">Annuler</a></li>
            </ul>
          </div>
        </div>
      </form>
      <div class="push"></div>
    </main>
    <footer>
      <ul class="bg-dark text-white">
        <li><a href="mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
  </body>
</html>
<?php }
  ?>
