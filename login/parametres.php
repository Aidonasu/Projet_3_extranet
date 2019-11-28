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
    <title>Projet3</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
		<script
				src="https://code.jquery.com/jquery-3.4.1.min.js"
				integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
				crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <img src="../logo/GBAF.png" alt="logo1">
			<p>
				<i class="fas fa-user"></i> <?=$_SESSION['nom'];?> <?=$_SESSION['prenom'];?>
				<br><br>
				<?php
        $id = $_GET['account'];
        require('../modele/pdoConnect.php');
				$query = $pdo->prepare('SELECT id_user,nom,prenom,username,password,question,reponse FROM account WHERE id_user=?');
				$query->execute([$id]);
				$results = $query->fetch(PDO::FETCH_ASSOC); ?>
				<a href="#"><i class="fas fa-cog"></i>Paramètres du comtpe</a>
				<br>
        <a href="deconnexion.php"><i class="fas fa-university"></i>Deconnexion</a>
      </p>
    </header>
    <main>
			<form class="" action="valid_modif_parametres.php" method="post">
				<fieldset>
					<legend>Paramètres du compte</legend>
					<p>
						<label for="nom">Nom</label>
						<input class="form-input" type="text" name="nom" value="<?=$results['nom'];?>">
					</p>
					<p>
						<label for="prenom">Prénom</label>
						<input class="form-input" type="text" name="prenom" value="<?=$results['prenom'];?>">
					</p>
					<p>
						<label for="username">UserName</label>
						<input class="form-input" type="text" name="username" value="<?=$results['username'];?>">
					</p>
					<p>
						<label for="password">Password</label>
						<input class="form-input" type="password" name="password" id="password" required>
						<label for="checkbox">
								<input type="checkbox" id="checkbox">
								Afficher le mot de passe
						</label>
					</p>
					<p>
							<label for="question">Question secrète </label>
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
							<label for="reponse">Réponse </label>
							<input class="form-input" type="text" name="reponse" required>
					</p>
					<input type="hidden" name="account" value="<?=$id;?>">
					<input type="submit" name="modifier" value="Modifier">
				</fieldset>
			</form>

      <a href="index.php">Retour</a>
    </main>
    <footer>
      <ul>
        <li>Mentions légales</li>
        <li>Contact</li>
      </ul>
    </footer>
		<script type="text/javascript" src="../js/reveal_code.js"></script>
  </body>
</html>
<?php }
	?>
