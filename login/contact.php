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
        <form class="" action="valid_contact.php" method="post">
          <div class="card border-primary mb-3">
   <div class="card-header">Nous contacter</div>
   <div class="card-body">
     <p class="card-text">
       <label for="nom">Votre nom (obligatoire)</label>
       <input class="form-input form-control" type="text" name="nom" required>
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
           <li><a href="index.php" class="text-white btn btn-outline-primary">Contact</a></li>
        </ul>
      </footer>
      <script type="text/javascript" src="js/reveal_code.js"></script>
   </body>
</html>
