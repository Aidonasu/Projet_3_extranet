<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Question secrète</title>
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
      <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-dark">
        <p>La question et/ou la réponse n'est pas correct !</p>
      </div>
      <?php endif; ?>
      <form class="" action="valid_secret_question.php" method="post">
        <div class="card border-primary mb-3">
          <div class="card-header">Question secrète</div>
          <div class="card-body">
            <div class="form-input form-group">
              <label for="question">Question secrète</label>
              <select class="form-input form-select form-control" name="question" required>
                <option value="" selected>--- Selectionner une question ---</option>
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
              <input class="form-input form-control" type="text" name="reponse" required>
            </p>
            <?php
              $id = $_GET['id_user'];
              ?>
            <input type="hidden" name="iduser" value="<?=$id;?>">
            <ul class="account center">
              <li><input type="submit" class="btn btn-primary" value="Rechercher"></li>
              <li><a href="../index.php" class="btn btn-link">Annuler</a></li>
            </ul>
          </div>
        </div>
      </form>
      </form>
    </main>
    <footer>
      <ul class="bg-dark text-white">
        <li><a href="../mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
        <li><a href="../contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
  </body>
</html>
