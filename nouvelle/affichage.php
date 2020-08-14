<?php session_start(); ?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $contenu = $article['contenu'];
      $image = $article['image_art'];
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}

?>
<head>
<link rel="stylesheet" href="../css/news.css">
</head>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>


<div class="artsol">
   <div class="img_artsol">
      <img src="<?= $image ?>" alt="">
   </div>
   <div class="text_artsol">
      <h1><?= $titre ?></h1>
      <p><?= $contenu ?></p>
   </div>
</div>