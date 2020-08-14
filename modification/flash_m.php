<?php
session_start(); 

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_flash = $bdd->prepare('SELECT * FROM flash WHERE id = ?');
   $edit_flash->execute(array($edit_id));
   if($edit_flash->rowCount() == 1) {
      $edit_flash = $edit_flash->fetch();
   } else {
      die('Erreur : la news n\'existe pas...');
   }
}
if(isset($_POST['messages'])) {
   if(!empty($_POST['messages'])) {
      
      $flash_contenu = $_POST['messages'];
      
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO flash (messages) VALUES (?)');
         $ins->execute(array( $flash_contenu));
         $message = 'Votre flash a bien été posté';
      } else {
         $update = $bdd->prepare('UPDATE flash SET messages = ? WHERE id = ?');
         $update->execute(array( $flash_contenu, $edit_id));
         $message = 'Votre flash a bien été mis à jour !';
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
      <textarea name="messages" id="editor1" ><?php if($mode_edition == 1) { ?><?= 
      $edit_flash['messages'] ?><?php } ?></textarea><br />
      <input type="submit" value="Envoyer le flash" />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>

<script>
   CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>