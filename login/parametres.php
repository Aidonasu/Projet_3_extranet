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
    <title>GBAF - Paramètres</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  </head>
  <body class="connecter">
    <header>
      <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
      <ul class="head_ul alert bg-dark">
        <li class="text-white"><i class="fas fa-user"></i> <?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?></li>
        <li><a href="parametres.php?account=<?=$_SESSION['id_user'];?>" class="text-white"><i class="fas fa-cog"></i>Paramètres du compte</a></li>
        <li class="text-white"><a href="deconnexion.php" class="text-white"><i class="fas fa-university"></i>Deconnexion</a></li>
      </ul>
    </header>
    <main>
      <form class="" action="valid_modif_parametres.php" method="post">
        <?php
          $id = $_GET['account'];
          require_once '../config-pdo.php';
          require '../modele/pdoConnect.php';
          $query = $pdo->prepare('SELECT id_user,nom,prenom,username,password,question,reponse FROM account WHERE id_user=?');
          $query->execute([$id]);
          $results = $query->fetch(PDO::FETCH_ASSOC);

          if ($results['id_user'] != $_SESSION['id_user']) {
            $true_user = $_SESSION['id_user'];
            header("Location:parametres.php?account=$true_user&error");
          }
              if (isset($_GET['error'])){?>
                <div class="alert alert-dark">
                  <p>Vous n'êtes pas autorisé à effectuer cette action !</p>
                </div>
          <?php } ?>
        <div class="card border-primary mb-3">
          <div class="card-header">Paramètres du compte</div>
          <div class="card-body">
            <p class="card-text">
              <label for="nom">Nom</label>
              <input class="form-input form-control" type="text" id="nom" name="nom" value="<?=$results['nom'];?>" required>
            </p>
            <p class="card-text">
              <label for="prenom">Prénom</label>
              <input class="form-input form-control" type="text" id="prenom" name="prenom" value="<?=$results['prenom'];?>" required>
            </p>
            <p class="card-text">
              <label for="username">Username</label>
              <input class="form-input form-control" type="text" id="username" name="username" value="<?=$results['username'];?>" required>
            </p>
            <p class="card-text">
              <label for="password">Password</label>
              <input class="form-input form-control" type="password" name="password" id="password" required>
              <label for="checkbox">
              <input type="checkbox" id="checkbox">
              Afficher le mot de passe
              </label>
            </p>
            <div class="form-input form-group">
              <label for="question">Question secrète</label>
              <select class="form-input form-select form-control" id="question" name="question" required>
                <option value="<?=$results['question'];?>" selected>Votre question : <?=$results['question'];?></option>
                <option value="">--- Selectionner une question ---</option>
                <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?
                <option value="Quel est le nom du pays que j’aimerais le plus visiter ?">Quel est le nom du pays que j’aimerais le plus visiter ?
                <option value="Quel est le nom du personnage historique que j’admire le plus ?">Quel est le nom du personnage historique que j’admire le plus ?
                <option value="Quelle est la  marque du premier véhicule que j’ai conduit ?">Quelle est la  marque du premier véhicule que j’ai conduit ?
                <option value ="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
                <option value ="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
                <option value ="Quel était le métier de votre grand-père ?">Quel était le métier de votre grand-père ?</option>
              </select>
            </div>
            <p class="card-text">
              <label for="reponse">Réponse</label>
              <input class="form-input form-control" type="text" id="reponse" name="reponse" value="<?=$results['reponse'];?>" required>
            </p>
            <input type="hidden" name="account" value="<?=$id;?>">
            <ul class="account center">
              <li><input id="submit" type="submit" class="btn btn-primary" value="Modifier"></li>
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
    <script src="../js/reveal_code.js"></script>
  </body>
</html>
<?php }
  ?>
