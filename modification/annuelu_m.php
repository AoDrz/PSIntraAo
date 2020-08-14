<?php session_start(); ?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_elu = $bdd->prepare('SELECT * FROM elu WHERE id = ?');
   $edit_elu->execute(array($edit_id));
   if($edit_elu->rowCount() == 1) {
      $edit_elu = $edit_elu->fetch();
   } else {
      die('Erreur : l\'elu n\'existe pas...');
   }
}
if(isset($_POST['nom'], $_POST['prenom'], $_POST['groupe'], $_POST['fonction'], $_POST['telelu'], $_POST['mailelu'])) {
   if(!empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['groupe']) AND !empty($_POST['fonction'])AND !empty($_POST['telelu'])AND !empty($_POST['mailelu'])) {
      
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $groupe = htmlspecialchars($_POST['groupe']);
      $fonction = htmlspecialchars($_POST['fonction']);
      $telelu= htmlspecialchars($_POST['telelu']);
      $mailelu = htmlspecialchars($_POST['mailelu']);
      
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO elu (nom, prenom, groupe, fonction, telelu, mailelu) VALUES (?, ?, ?, ?, ?, ?)');
         $ins->execute(array($nom, $prenom, $groupe, $fonction, $telelu, $mailelu));
         $message = 'Votre Elu a bien été ajouté';
      } else {
         $update = $bdd->prepare('UPDATE elu SET nom = ?, prenom = ?, groupe = ?, fonction = ?, telelu = ?, mailelu = ?  WHERE id = ?');
         $update->execute(array($nom, $prenom, $groupe, $fonction, $telelu, $mailelu, $edit_id));
         $message = 'Votre Elu a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>


<div class="container">
  <h2>Formulaire de mise à jour des elus</h2>
  
  <form action="" class="was-validated" method="POST">
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" placeholder="nom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_elu['nom'] ?>"<?php } ?> name="nom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" id="prenom" placeholder="prenom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_elu['prenom'] ?>"<?php } ?> name="prenom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
    <label for="groupe">Groupe:</label>
    <select class=form-control name="groupe">
      <option value=1> Pour l’avenir, ensemble continuons Carvin</option>
      <option value=2>A Carvin, l’Humain d’abord </option>
      <option value=3>Rassemblement bleu marine</option>
      <option value=4>Non inscrit</option>
    </select>
    </div>
    <div class="form-group">
      <label for="fonction">Fonction:</label>
      <input type="text" class="form-control" id="fonction" placeholder="fonction"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_elu['fonction'] ?>"<?php } ?> name="fonction" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="telelu">Telephone :</label>
      <input type="text" class="form-control" id="telelu" placeholder="telelu"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_elu['telelu'] ?>"<?php } ?> name="telelu" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="mailelu">E-Mail:</label>
      <input type="text" class="form-control" id="mailelu" placeholder="mailelu"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_elu['mailelu'] ?>"<?php } ?> name="mailelu" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>
