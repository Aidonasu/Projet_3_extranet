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
        <a href="deconnexion.php"><i class="fas fa-university"></i>Deconnexion</a>
      </p>
    </header>
    <main>
      <?php
        $id = $_GET['acteurs'];
          require('../modele/pdoConnect.php');
          $query = $pdo->prepare('SELECT acteur,description,logo FROM acteur where id_acteur = ?');
          $query->execute([$id]);
          $results = $query->fetch(PDO::FETCH_ASSOC);
         ?>
         <div class="center">
          <img src="../logo/<?=$results['logo'];?>" alt="">
         </div>
         <h2><?=$results['acteur'];?></h2>
         <p class="mobile_description"><?=$results['description'];?></p>

				 <fieldset>
				 	<legend>Commentaires</legend>
					<div class="comments">
						<a href="#">Nouveau commentaire</a>
						<ul class="hand">
							<li><i class="fas fa-thumbs-up"></i></li>
							<li><i class="fas fa-thumbs-down"></i></li>
						</ul>
					</div>
				 </fieldset>
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
