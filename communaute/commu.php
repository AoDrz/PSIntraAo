<?php session_start(); 
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$membres = $bdd->query('SELECT * FROM membres ORDER BY nom ASC');
?>
<head>
<link rel="stylesheet" href="../css/commu.css">
</head>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<div class="col-sm-12 flick">
    liens flicker supprimer
</div>
<br>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <?php while($a = $membres->fetch()) { ?>
            <div class="col-12 col-sm-3 cardstat ">
                <div class="card  " >
                    <img class="card-img-top rounded-circle imgcard " src="<?= $a['avatar'] ?>" alt="Card image" >
                    <div class="card-body">
                    <h4 class="card-title"><?= $a['nom'] ?> <?= $a['prenom'] ?></h4>
                    <p class="card-text"><?= substr($a['resume'], 0, 90 )?></p>
                    <a href="#" class="btn btn-primary">Profil</a>
                    <a href="#" class="btn btn-primary"> Envoie un message</a>
                </div>
            </div>
        </div>
        <?php } ?>
</div>


