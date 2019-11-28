<?php

$login = htmlspecialchars($_POST['login']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$question = htmlspecialchars($_POST['question']);
$reponse = htmlspecialchars($_POST['reponse']);


$pdo = new PDO('mysql:host=localhost;dbname=extranet-gbaf', 'root', 'f9m2zlri');  /* connection à la base de données */
$pdo->exec('SET NAMES UTF8');

$query = $pdo->prepare("INSERT INTO account (nom, prenom, username, password, question, reponse)
VALUES(?,?,?,?,?,?)");

$query->execute(array($nom,$prenom,$login,$password,$question,$reponse));


header('Location:index.php?sucess=1');
exit();
?>
