<?php
  session_start();

  if (!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])){
  header('Location:index.php');
  exit();
  }
  else {
    require_once '../config-pdo.php';
    require '../modele/pdoConnect.php';
    $id = $_GET['acteurs'];
      $query = $pdo->prepare('SELECT id_acteur,acteur,description,logo FROM acteur where id_acteur = ?');
      $query->execute([$id]);
      $results = $query->fetch(PDO::FETCH_ASSOC);

      if (!$results['id_acteur']) {
        header("Location:index.php?error");
     }
    ?>
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
      <h2><?=$results['acteur'];?></h2>
      <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-dark">
        <p>Veuillez remplir le champ afin de publier un commentaire, merci !</p>
      </div>
    <?php endif;?>
      <form class="" action="valid_new_comment.php" method="post">
        <div class="card border-primary mb-3">
          <div class="card-header">Nouveau commentaire</div>
          <div class="card-body">
            <p>Merci de donner un avis​ professionnel et constructif.</p>
          </div>
          <div class="form-group form-input text_area">
            <label for="new_comment"></label>
            <textarea class="form-control exampleTextarea" id="new_comment" rows="3" name="new_comment" required></textarea>
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
        <li><a href="contact.php" class="text-white btn btn-outline-primary">Contact</a></li>
      </ul>
    </footer>
  </body>
</html>
<?php }
  ?>
