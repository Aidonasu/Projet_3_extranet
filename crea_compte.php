<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GBAF - Création compte</title>
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
      <h1><i class="fas fa-university"></i> Création d'un compte utilisateur</h1>
      <form class="generic-form champs" action="valid_creacompte.php" method="post">
        <div class="card border-primary mb-3">
          <div class="card-header">Créer un compte</div>
          <div class="card-body">
            <p class="card-text">
              <label for="login">UserName</label>
              <input class="form-input form-control" type="text" name="login" required>
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
        </div>
        <div class="card border-primary mb-3">
          <div class="card-header">Détails</div>
          <div class="card-body">
            <p class="card-text">
              <label for="nom">Nom</label>
              <input class="form-input form-control" type="text" name="nom" required>
            </p>
            <p class="card-text">
              <label for="password">Prénom</label>
              <input class="form-input form-control" type="text" name="prenom" required>
            </p>
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
            <ul class="account center">
              <li><input id="submit" type="submit" class="btn btn-primary" value="Créer le compte"></li>
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
    <script type="text/javascript" src="js/reveal_code.js"></script>
  </body>
</html>
