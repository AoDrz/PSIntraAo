<?php session_start(); 
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<div>
      <div align="center">
         <h2>Profil de <?php echo $a['prenom']; ?></h2>
         <br /><br />
         Nom = <?php echo $a['nom']; ?>
         <br />
         Prénom = <?php echo $a['prenom']; ?>
         <br />
         Telephone = <?php echo $a['telephone']; ?>
         <br />
         Mail = <?php echo $a['mail']; ?>
         <br />
         <a href="editprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a> 
         
      </div>
     
</div>