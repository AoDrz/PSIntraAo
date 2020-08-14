<?php
session_start(); 

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = $_POST['article_contenu'];
      $article_image = htmlspecialchars($_POST['article_image']);
      $article_cat = htmlentities($_POST['article_cat']);
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, image_art, id_cat_art, datetimepublic) VALUES (?, ?, ?, ?, NOW())');
         $ins->execute(array($article_titre, $article_contenu, $article_image, $article_cat));
         $message = 'Votre article a bien été posté';
      } else {
         $update = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, image_art = ?, id_cat_art = ?, datetimedit = NOW() WHERE id = ?');
         $update->execute(array($article_titre, $article_contenu, $article_image, $article_cat, $edit_id));
         $message = 'Votre article a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    
</head>
<body>
    
<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>


    <form method="POST">
       <label for="">Service :</label>
       <select name="article_cat" <?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['id_cat_art'] ?>"<?php } ?>>
         <option value=""> ----- Choisir ----- </option>
         <option value="1"> Communication </option>
         <option value="2"> Ressource humaine </option>
         <option value="3"> Elu </option>
      </select>
      <br>
      <label for="">Image d'en-tête :</label>
      <input type="text" name="article_image" placeholder="url de l'image"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['image_art'] ?>"<?php } ?> /><br />
      <input type="text" name="article_titre" placeholder="Titre"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_article['titre'] ?>"<?php } ?> /><br />
      <textarea name="article_contenu" id="editor1" ><?php if($mode_edition == 1) { ?><?= 
      $edit_article['contenu'] ?><?php } ?></textarea><br />
      <input type="submit" value="Envoyer l'article" />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>

<script>
   CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>