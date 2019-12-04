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
      <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
			<p>
				<i class="fas fa-user"></i> <?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?>
				<br><br>
				<a href="parametres.php?account=<?=$_SESSION['id_user'];?>"><i class="fas fa-cog"></i>Paramètres du comtpe</a>
				<br>
        <a href="deconnexion.php"><i class="fas fa-university"></i>Deconnexion</a>
      </p>
    </header>
    <main>
      <section class="mobile_text">
        <h1>Présentation de la GBAF</h1>
        <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
        <ul>
          <li>La BNP Paribas</li>
          <li>BPCE</li>
          <li>Crédt Agricole</li>
          <li>Crédit Mutuel-CIC</li>
          <li>Société Générale</li>
          <li>La Banque Postale</li>
        </ul>
        <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
      </section>
      <section>
        <h2>Textes acteurs et partenaires</h2>
        <fieldset class="container">
        <?php

					require_once '../config-pdo.php';
          require '../modele/pdoConnect.php';
          $query = $pdo->prepare('SELECT id_acteur,logo,acteur,description FROM acteur');
          $query->execute();
          $results = $query->fetchall(PDO::FETCH_ASSOC);
          foreach ($results as $value) {
          ?>
          <fieldset class="acteurs">
            <section class="tablet-acteurs">
              <div class="center">
                <img src="../logo/<?=$value['logo'];?>">
              </div>
              <div class="">
                <h3><?=$value['acteur'];?></h3>
                <p><?=SUBSTR($value['description'],0,53);?>...</p>
              </div>
            </section>
            <div class="link">
              <a href="acteurs.php?acteurs=<?=$value['id_acteur'];?>" class="test">lire la suite</a>
            </div>
          </fieldset>
        <?php } ?>
        </fieldset>
      </section>

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
