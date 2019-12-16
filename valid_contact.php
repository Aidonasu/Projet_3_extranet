<?php
  $nom = htmlspecialchars($_POST['nom']);
  $mail = htmlspecialchars($_POST['mail']);
  $objet = htmlspecialchars($_POST['objet']);
  $contenu = htmlspecialchars($_POST['message']);


  if (empty($nom) || empty($mail) || empty($objet) || empty($contenu)) {
  sleep(1);
  header('Location:contact.php?error');
  exit();
  }
  else {
  // Plusieurs destinataires
  $to  = 'manu_07130@hotmail.com'; // notez la virgule

  // Sujet
  $subject = $objet;

  //Contenu
  $message = $contenu.'<br><br>'.'De '.$nom;

  // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=utf8\n';

  // En-têtes additionnels
  $headers[] = 'From: '.$mail;

  // Envoi
  mail($to, $subject,$message, implode("\r\n", $headers));

  header('Location:contact.php?success');
  exit();
  }

  ?>
