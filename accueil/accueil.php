<?php
session_start();


$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$membres = $bdd->query("SELECT * FROM membres WHERE DATE_FORMAT(datenaissance,  '%d%m') = DATE_FORMAT(NOW(), '%d%m')"); 

$flash = $bdd->query('SELECT * FROM flash ORDER BY id DESC LIMIT 3');

$jointure_art="
   SELECT  
  articles.id, articles.titre,  cat_article.cat_art
FROM 
  articles
    LEFT JOIN cat_article
      ON articles.id_cat_art = cat_article.id_cat_art 
ORDER BY 
    datetimepublic DESC
LIMIT 2
    ";

$news = $bdd->prepare($jointure_art);
$news->execute();


if($_SESSION['droit'] == '1'){ 
    $ix = 'accadmin';

}elseif($_SESSION['droit'] == '2'){
    $ix = 'accadmin';
        
}else{
    $ix = 'accmemb';
};
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
    <link rel="stylesheet" href="../css/accueil.css">
    <script type="text/javascript" src="../js/fonction.js"></script>
    <title>Au Divan</title>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div id="p1" class="col-sm-6">
            <div class="col-sm-12">
            <?php require'../element/verifco.php'; ?>
                <h1 class="titre">
                    <span id="t1">Au menu </span> <br> 
                </h1>
            </div>
            <div class="col-sm-12" class="menupic">
                <?php require '../element/menupicto.php'; ?>
            </div>
            <div id="canap" class="col-sm-12 ">
                <h2  id="piedcanap"><span>  <?php echo $_SESSION['prenom']; ?> , <br> Bienvenue au Divan </span></h2>
            </div>
        </div>
        <div id="p2" class="col-sm-6">
            <div class="accp1">
              <br>
            <h1> A la UNE </h1>
                <p> Ils ont un an de plus aujourd'hui : </p>
                <div class="row">
                  <?php while($a = $membres->fetch()) { ?>  
                  <div class="col-3 ">
                    <img class="img-top" src="<?= $a['avatar'] ?>" alt="Card image" >
                    <div class="text-top">
                      <h4 > <?= $a['prenom'] ?> </h4>
                    </div>
                  </div>
                  <?php } ?>
                </div>  
            </div>
                    
            <div class="accp2">  

            <div id="flashinfo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                  <li data-target="#flashinfo" data-slide-to="0" class="active"></li>
                  <li data-target="#flashinfo" data-slide-to="1"></li>
                  <li data-target="#flashinfo" data-slide-to="2"></li>
                  <li data-target="#flashinfo" data-slide-to="3"></li>
                </ul>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../image/backflash.png" alt="" width="600" height="200">
                    <div class="carousel-caption">
                      <h3>flash info </h3>
                      <p><?php
                        setlocale(LC_TIME, 'fra_fra');
                        echo strftime('%A %d %B %Y');
                        ?>
                      </p>
                    </div>   
                  </div>
                  <?php while($f = $flash->fetch()) { ?>   
                  <div class="carousel-item">
                    <img src="../image/backflash.png" alt="" width="600" height="200">
                    <div class="carousel-caption">
                      <h3>Flash info n°<?= $f['id'] ?>:</h3>
                      <p><?= $f['messages'] ?></p>
                    </div>   
                  </div>
                  <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#flashinfo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#flashinfo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              </div>
            </div>

            <div class="accp3"> 
                <h2>Les dernières actus :</h2>
                    <p class="article">
                        <?php while($n = $news->fetch()) { ?>   
                        <?= $n['cat_art'] ?> : <a href="../nouvelle/affichage.php?id=<?= $n['id'] ?>"> <?= $n['titre'] ?> </a> <br>  
                        <?php } ?>
                    </p>
                    <p class="actu"><a href="../nouvelle/nouvelle.php">Toutes les actus</a></p>
                
                
            </div>
            <div class="<?= $ix ?>">
              <div class="accp4">
                <p>
                    <a href="../admin/admin.php"> Accéder à l'espace Administration </a>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <footer>

    </footer>
</body>