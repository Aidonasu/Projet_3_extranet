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
					 <?php
					 require('../modele/pdoConnect.php');
					 $query = $pdo->prepare('SELECT vote FROM vote where id_acteur = ?');
					 $query->execute([$id]);
					 $results = $query->fetch(PDO::FETCH_ASSOC);
					 ?>
					 <form class="" action="valid_vote.php" method="post">
						 <input type="submit" name="" value="">
					 </form>
				 	<legend>Commentaires</legend>
					<div class="comments">
						<a href="new_comment_acteurs.php?acteurs=<?=$id;?>">Nouveau commentaire</a>
						<input type="hidden" name="acteurs" value="<?=$id;?>">
						<ul class="like_dislike">
							<li><?=$results['vote'];?></li>
							<li><a class="hand"><i class="fas fa-thumbs-up"></i><i class="fas fa-thumbs-down"></i></a></li>
						</ul>

					</div>

						<?php
						require('../modele/pdoConnect.php');
	          $query = $pdo->prepare('SELECT post,date_add FROM post where id_acteur = ?');
	          $query->execute([$id]);
	          $results = $query->fetchall(PDO::FETCH_ASSOC);
						foreach ($results as $value) {
							$date = substr($value['date_add'],0,10);
	            $datefr = explode('-', $date);
	        ?>
					<div class="new_comment">
						<p><?=$_SESSION['prenom'];?> le <?="$datefr[2]-$datefr[1]-$datefr[0]"?></p>
						<p><?=$value['post'];?></p>
					</div>
				<?php } ?>
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
