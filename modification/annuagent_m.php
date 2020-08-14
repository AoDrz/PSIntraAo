<?php session_start(); ?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_agent = $bdd->prepare('SELECT * FROM agent WHERE id = ?');
   $edit_agent->execute(array($edit_id));
   if($edit_agent->rowCount() == 1) {
      $edit_agent = $edit_agent->fetch();
   } else {
      die('Erreur : l\'agent n\'existe pas...');
   }
}
if(isset($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['telposte'])) {
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])AND !empty($_POST['tel'])AND !empty($_POST['telposte'])) {
      
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $mail = htmlspecialchars($_POST['mail']);
      $tel= htmlspecialchars($_POST['tel']);
      $telposte = htmlspecialchars($_POST['telposte']);
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO agent (nom, prenom, mail, tel, telposte) VALUES (?, ?, ?, ?, ?)');
         $ins->execute(array($nom, $prenom, $mail, $tel, $telposte));
         $message = 'Votre agent a bien été ajouté';
      } else {
         $update = $bdd->prepare('UPDATE agent SET nom = ?, prenom = ?, mail = ?, tel = ?, telposte = ?  WHERE id = ?');
         $update->execute(array($nom, $prenom, $mail, $tel, $telposte, $edit_id));
         $message = 'Votre agent a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>


 <div class="container">
  <h2>Formulaire de mise à jour des agents</h2>
  
  <form action="" class="was-validated" method="POST">
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" placeholder="nom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_agent['nom'] ?>"<?php } ?> name="nom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" id="prenom" placeholder="prenom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_agent['prenom'] ?>"<?php } ?> name="prenom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="mail">Mail:</label>
      <input type="text" class="form-control" id="mail" placeholder="mail"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_agent['mail'] ?>"<?php } ?> name="mail" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="tel">Telephone:</label>
      <input type="text" class="form-control" id="tel" placeholder="tel"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_agent['tel'] ?>"<?php } ?> name="tel" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="telposte">Telephone poste:</label>
      <input type="text" class="form-control" id="telposte" placeholder="telposte"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_agent['telposte'] ?>"<?php } ?> name="telposte" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>
    
   