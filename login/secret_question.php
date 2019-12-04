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
  </head>
  <body>
    <header>
      <a href="../index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
    </header>
    <main>
      <form class="" action="valid_secret_question.php" method="post">
      <fieldset class="forgot">
         <legend>Question secrète</legend>
         <p>Merci de bien reprendre votre question secrète et votre réponse, afin de créer un nouveau mot de passe.</p>

           <p>
               <label for="question">Question secrète :</label>
               <select class="form-input form-select" name="question" required>
                 <option value="" selected>--- Selectionner une question ---</option>
                 <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?
                 <option value="Quel est le nom du pays que j’aimerais le plus visiter ?">Quel est le nom du pays que j’aimerais le plus visiter ?
                 <option value="Quel est le nom du personnage historique que j’admire le plus ?">Quel est le nom du personnage historique que j’admire le plus ?
                 <option value="Quelle est la  marque du premier véhicule que j’ai conduit ?">Quelle est la  marque du premier véhicule que j’ai conduit ?
                 <option value ="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
                 <option value ="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
                 <option value ="Quel était le métier de votre grand-père ?">Quel était le métier de votre grand-père ?</option>
               </select>
           </p>
           <p>
             <label for="reponse">Réponse</label>
             <input class="form-input" type="text" name="reponse" required>
           </p>
           <ul class="account">
             <li><input type="submit" name="recherche" value="Rechercher" ></li>
             <li><a href="../index.php" class="button button-cancel">Annuler</a></li>
           </ul>
      </fieldset>

   </form>
    </main>
    <footer>
      <ul>
        <li>Mentions légales</li>
        <li>Contact</li>
      </ul>
    </footer>
  </body>
</html>
