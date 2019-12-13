<?php
  $nom = htmlspecialchars($_POST['nom']);
  $mail = htmlspecialchars($_POST['mail']);
  $objet = htmlspecialchars($_POST['objet']);
  $contenu = htmlspecialchars($_POST['message']);

       // Plusieurs destinataires
       $to  = 'manu_07130@hotmail.com'; // notez la virgule

       // Sujet
       $subject = $objet;

       //Contenu
       $message = $contenu.'<br><br>'.'De '.$nom;

       // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
       $headers[] = 'MIME-Version: 1.0';
       $headers[] = 'Content-type: text/html; charset=iso-8859-1';

       // En-têtes additionnels
       $headers[] = 'From: '.$mail;

       // Envoi
       mail($to, $subject,$message, implode("\r\n", $headers));

  header('Location:contact.php?success');
  exit();
  ?>
