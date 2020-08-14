<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bdd->prepare('DELETE FROM agent WHERE id = ?');
   $suppr->execute(array($suppr_id));
   header('Location: http://localhost/intranetpresentation/annuaire/annuaire.php');
}
?>