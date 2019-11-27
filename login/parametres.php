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
  </head>
  <body>
    <header>
      <img src="../logo/GBAF.png" alt="logo1">
			<p>
				<i class="fas fa-user"></i> <?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?>
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
      <section class="mobile_text">
        <h1>Paramètres du compte</h1>
        <ul class="account">
          <li>Nom</li>
          <li><?=$results['nom'];?></li>
          <li>Modifier</li>
        </ul>
        <ul class="account">
          <li>Prénom</li>
          <li><?=$results['prenom'];?></li>
          <li>Modifier</li>
        </ul>
        <ul class="account">
          <li>UserName</li>
          <li><?=$results['username'];?></li>
          <li>Modifier</li>
        </ul>
        <ul class="account">
          <li>Password</li>
          <li><?=$results['password'];?></li>
          <li>Modifier</li>
        </ul>
        </ul>
      </section>
      <a href="index.php">Retour</a>

    </main>
    <footer>
      <ul>
        <li>Mentions légales</li>
        <li>Contact</li>
      </ul>
    </footer>
  </body>
</html>
<?php }
	?>
