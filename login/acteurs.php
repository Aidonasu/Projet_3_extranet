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
        <i class="fas fa-user"></i>
        <?=$_SESSION['nom']?>
        <?=$_SESSION['prenom'];?>
        <br>
        <br>
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
      <div class="center">
        <img src="../logo/<?=$results['logo'];?>" alt="">
      </div>
      <h2><?=$results['acteur'];?></h2>
      <p class="mobile_description">
        <?=$results['description'];?>
      </p>
      <fieldset>
        <legend>Commentaires</legend>
        <?php
          $user = $_SESSION['id_user'];
          $comment = $pdo->prepare("SELECT id_user,id_acteur FROM post where id_user=? and id_acteur=?");
          $comment->execute([$user,$id]);
          $results_com = $comment->fetch(PDO::FETCH_ASSOC);

          if ($results_com['id_user']) {?>
        <p>Vous avez écrit un commentaire ! (1 commenteur par acteur)</p>
        <?php }
          if (isset($_GET['error'])) {
            if ($_GET['error']==1) {
              echo 'Vous avez déjà écrit !';
              sleep(1);
            }
            elseif ($_GET['error']==2) {
              echo 'Vous avez déjà voté !';
              sleep(1);
            }
          } ?>
        <div class="comments">
          <a href="new_comment_acteurs.php?acteurs=<?=$id;?>">Nouveau commentaire</a>
          <input type="hidden" name="acteurs" value="<?=$id;?>">
          <section class="like_dislike">
            <?php
              $query = $pdo->prepare('SELECT id_user,SUM(vote_like) AS votelike,SUM(vote_dislike) AS votedislike FROM vote where id_acteur = ?');
              $query->execute([$id]);
              $results = $query->fetch(PDO::FETCH_ASSOC);

              ?>
            <div class="hand">
              <p><?=$results['votelike'];?></p>
              <form class="" action="valid_vote_like.php" method="post">
                <button class="like" type="submit" name="like"><i class="fas fa-thumbs-up"></i></button>
                <input type="hidden" name="acteurs" value="<?=$id;?>">
              </form>
            </div>
            <div class="hand">
              <p><?=$results['votedislike'];?></p>
              <form class="" action="valid_vote_dislike.php" method="post">
                <button class="dislike" type="submit" name="dislike"><i class="fas fa-thumbs-down"></i></button>
                <input type="hidden" name="acteurs" value="<?=$id;?>">
              </form>
            </div>
          </section>
        </div>
        <?php
          require '../modele/pdoConnect.php';
               $query = $pdo->prepare('SELECT prenom,post,date_add FROM post INNER JOIN account ON post.id_user=account.id_user where id_acteur = ?');
               $query->execute([$id]);
               $results = $query->fetchall(PDO::FETCH_ASSOC);
          foreach ($results as $value) {
          	$date = substr($value['date_add'],0,10);
                 $datefr = explode('-', $date);
             ?>
        <div class="new_comment">
          <p>
            <?=$value['prenom'];?> le
            <?="$datefr[2]-$datefr[1]-$datefr[0]"?>
          </p>
          <p>
            <?=$value['post'];?>
          </p>
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
