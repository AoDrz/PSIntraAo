<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$req = $bdd->prepare('INSERT INTO flash (messages) VALUES(?)');
$req->execute(array($_POST['messages']));
?>

