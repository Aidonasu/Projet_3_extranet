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
        <a href="deconnexion.php"><i class="fas fa-university"></i>Deconnexion</a>
      </p>
    </header>
    <main>
      <?php
        $id = $_GET['acteurs'];
				require_once '../config-pdo.php';
				require '../modele/pdoConnect.php';
          $query = $pdo->prepare('SELECT acteur,description,logo FROM acteur where id_acteur = ?');
          $query->execute([$id]);
          $results = $query->fetch(PDO::FETCH_ASSOC);
         ?>

         <h2><?=$results['acteur'];?></h2>
         <form class="" action="valid_new_comment.php" method="post">
           <fieldset>
            <legend>Nouveau commentaire</legend>
             <label for="new_comment"></label>
             <textarea class="form-input" name="new_comment" rows="8" cols="80"></textarea>
             <input type="hidden" name="acteurs" value="<?=$id;?>">
             <ul class="account">
               <li><input type="submit" name="publier" value="Publier"></li>
               <li><a href="acteurs.php?acteurs=<?=$id;?>">Retour</a></li>
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
<?php }
	?>
