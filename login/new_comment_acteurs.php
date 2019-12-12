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
    <title>GBAF - Nouveau commenaire</title>
    <link rel="stylesheet" href="../fontawesome5/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="connecter">
    <header>
      <a href="index.php"><img src="../logo/GBAF.png" alt="logo1"></a>
      <ul class="head_ul alert bg-dark">
        <li class="text-white"><i class="fas fa-user"></i> <?=$_SESSION['nom']?> <?=$_SESSION['prenom'];?></li>
        <li><a href="parametres.php?account=<?=$_SESSION['id_user'];?>" class="text-white"><i class="fas fa-cog"></i>Paramètres du compte</a></li>
        <li class="text-white"><a href="deconnexion.php" class="text-white"><i class="fas fa-university"></i>Deconnexion</a></li>
      </ul>
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
        <div class="card border-primary mb-3">
          <div class="card-header">Nouveau commentaire</div>
          <div class="form-group form-input text_area">
            <label for="exampleTextarea"></label>
            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            <input type="hidden" name="acteurs" value="<?=$id;?>">
          </div>
          <ul class="account center area">
            <li><input type="submit" class="btn btn-primary" name="publier" value="Publier"></li>
            <li><a href="acteurs.php?acteurs=<?=$id;?>" class="btn btn-link">Retour</a></li>
          </ul>
        </div>
      </form>
			<div class="push"></div>
    </main>
		<footer>
			<ul class="bg-dark text-white">
				<li><a href="mentions_legales.php" class="text-white btn btn-outline-primary">Mentions légales</a></li>
				<li><a href="#" class="text-white btn btn-outline-primary">Contact</a></li>
			</ul>
		</footer>
  </body>
</html>
<?php }
  ?>
