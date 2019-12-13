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
    <title>GBAF - <?=$results['acteur'];?></title>
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
      <div class="card mb-3 border-primary">
        <div class="flex_principal_acteur">
          <div class="center">
            <img src="../logo/<?=$results['logo'];?>">
          </div>
          <div class="card-body-text">
            <h3 class="card-title center"><?=$results['acteur'];?></h3>
            <p class="card-text"><?=$results['description'];?></p>
          </div>
        </div>
      </div>
      <div class="card border-primary mb-3">
        <div class="card-header">Commentaires <small class="form-text text-muted">(1 commentaire et 1 vote par acteur).</small></div>
        <?php
          $user = $_SESSION['id_user'];
          $comment = $pdo->prepare("SELECT id_user,id_acteur FROM post where id_user=? and id_acteur=?");
          $comment->execute([$user,$id]);
          $results_com = $comment->fetch(PDO::FETCH_ASSOC);

          if ($results_com['id_user']) {?>
        <p>Vous avez écrit un commentaire ! (1 commentaire par acteur)</p>
        <?php }
          if (isset($_GET['error'])) {
            if ($_GET['error']==1) {?>
        <div class="alert alert-dark">
          <p>Vous avez déjà écrit un commentaire !</p>
        </div>
        <?php sleep(1);
          }
          elseif ($_GET['error']==2) {?>
        <div class="alert alert-dark">
          <p>Vous avez déjà voté</p>
        </div>
        <?php sleep(1);
          }
          } ?>
        <div class="card-body">
          <div class="comments">
            <a href="new_comment_acteurs.php?acteurs=<?=$id;?>" class="btn btn-primary">Nouveau commentaire</a>
            <input type="hidden" name="acteurs" value="<?=$id;?>">
            <section class="like_dislike">
              <?php
                $query = $pdo->prepare('SELECT id_user,SUM(vote_like) AS votelike,SUM(vote_dislike) AS votedislike FROM vote where id_acteur = ?');
                $query->execute([$id]);
                $results = $query->fetch(PDO::FETCH_ASSOC);
                ?>
              <div class="hand">
                <?php
                  $like = 'black';
                  $dislike = 'black';
                  if ($results['votelike']) {
                  $like = 'green';
                  }
                  elseif ($results['votedislike']) {
                   $dislike = 'red';
                  }?>
                <p><?=$results['votelike'];?></p>
                <form class="" action="valid_vote_like.php" method="post">
                  <button class="like" type="submit" name="like"><i class="fas fa-thumbs-up" style="color:<?=$like;?>"></i></button>
                  <input type="hidden" name="acteurs" value="<?=$id;?>">
                </form>
              </div>
              <div class="hand">
                <p><?=$results['votedislike'];?></p>
                <form class="" action="valid_vote_dislike.php" method="post">
                  <button class="dislike" type="submit" name="dislike"><i class="fas fa-thumbs-down" style="color:<?=$dislike;?>"></i></button>
                  <input type="hidden" name="acteurs" value="<?=$id;?>">
                </form>
              </div>
            </section>
          </div>
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
          <div class="alert alert-dismissible alert-secondary">
            <p><?=$value['post'];?></p>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="center">
        <a href="index.php" class="btn btn-link">Retour</a>
      </div>
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
