<?php session_start();
?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>


<div>
      <div align="center">
         <h2>Profil de <?php echo $_SESSION['prenom']; ?></h2>
         <br /><br />
         Nom = <?php echo $_SESSION['nom']; ?>
         <br />
         Prénom = <?php echo $_SESSION['prenom']; ?>
         <br />
         Telephone = <?php echo $_SESSION['telephone']; ?>
         <br />
         Mail = <?php echo $_SESSION['mail']; ?>
         <br />
         <a href="editprofil.php">Editer mon profil</a>
         
      </div>
     
</div>