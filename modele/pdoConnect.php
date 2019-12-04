<?php

$pdo = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
$pdo->exec('SET NAMES UTF8');

 ?>
