<?php session_start();
?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");

$jointure_art="
   SELECT  
  articles.id, articles.titre, articles.contenu, articles.image_art, cat_article.cat_art
FROM 
  articles
    LEFT JOIN cat_article
      ON articles.id_cat_art = cat_article.id_cat_art 
ORDER BY 
    datetimepublic DESC
LIMIT 10
    ";

$reqarticle = $bdd->prepare($jointure_art);
$reqarticle->execute();
?>

<head>
<link rel="stylesheet" href="../css/news.css">
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
</head>



<div class="container-fluid">
    <div class="row justify-content-md-center">
        

<?php $ix=0; 
    while($a = $reqarticle->fetch()) {
        if ($ix==0) {
            $ixstyle = "art" ;
            $ixstyle2 = "img_art";
            $ixstyle3 = "text_art";
        }elseif ($ix==1 || $ix==2) {
            $ixstyle = "art2" ;
            $ixstyle2 = "img_art2";
            $ixstyle3= "text_art2";
        }else {
            $ixstyle = "art3";
            $ixstyle2 =  "img_art3";
            $ixstyle3 = "text_art3";
          }  
        ?>  

        <div class="<?= $ixstyle ?> ">
            <div class=<?= $ixstyle2 ?>>
                <img src="<?= $a['image_art'] ?>" alt="">
            </div>
            <div class="<?= $ixstyle3 ?>">
                <h5> <?= $a['cat_art'] ?></h5>
                <h1><?= $a['titre'] ?></h1>
                <p><?= substr($a['contenu'],0,120) ?></p>
                <span><a href="../nouvelle/affichage.php?id=<?= $a['id'] ?>"> Lire la suite</a></span>
            </div>
        </div>
  
<?php $ix++; 
 }
 
?>
