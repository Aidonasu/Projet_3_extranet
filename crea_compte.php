<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet3</title>
    <link rel="stylesheet" href="fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <img src="logo/GBAF.png" alt="logo1">
    </header>
    <main>
        <h2><i class="fas fa-university"></i> Création d'un compte utilisateur</h2>

        <form class="generic-form champs" action="valid_creacompte.php" method="post">
            <fieldset>
                <legend>Créer un compte</legend>
                <p>
                    <label for="login">UserName(*) :</label>
                    <input type="text" name="login" required>
                </p>
                <p>
                    <label for="password">Password(*) :</label>
                    <input id="mdp" type="password" name="password" required>
                </p>
            </fieldset>
            <fieldset>
                <legend>Détails</legend>
                <p class="ligne">
                    <label for="nom">Nom(*) :</label>
                    <input id="nom" type="text" name="nom" required>
                </p>
                <p>
                    <label for="prenom">Prénom(*) :</label>
                    <input id="prenom" type="text" name="prenom" required>
                </p>
                <p>
                    <label for="question">Question secrète(*) :</label>
                    <input id="prenom" type="text" name="question" required>
                </p>
                <p>
                    <label for="reponse">Réponse(*) :</label>
                    <input id="prenom" type="text" name="reponse" required>
                </p>

            </fieldset>
            <p>(*) Champs obligatoires</p>
            <ul class="link-list">
                <li>
                    <input id="submit" type="submit" class="button button-primary" value="Créer le compte">
                </li>
                <li><a href="index.php" class="button button-cancel">Annuler</a></li>
            </ul>
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
