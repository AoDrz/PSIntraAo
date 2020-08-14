<?php session_start(); ?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_assos = $bdd->prepare('SELECT * FROM assos WHERE id = ?');
   $edit_assos->execute(array($edit_id));
   if($edit_assos->rowCount() == 1) {
      $edit_assos = $edit_assos->fetch();
   } else {
      die('Erreur : l\'assos n\'existe pas...');
   }
}
if(isset($_POST['nomassos'], $_POST['pdtassos'], $_POST['pdtadresse'], $_POST['pdttel'], $_POST['pdttel2'], $_POST['pdtmail'], $_POST['vpsassos'], $_POST['vpsadresse'], $_POST['vpstel'], $_POST['vpsmail'])) {
      
      $nomassos = htmlspecialchars($_POST['nomassos']);
      $pdtassos = htmlspecialchars($_POST['pdtassos']);
      $pdtadresse = htmlspecialchars($_POST['pdtadresse']);
      $pdttel= htmlspecialchars($_POST['pdttel']);
      $pdttel2 = htmlspecialchars($_POST['pdttel2']);
      $pdtmail = htmlspecialchars($_POST['pdtmail']);
      $vpsassos = htmlspecialchars($_POST['vpsassos']);
      $vpsadresse = htmlspecialchars($_POST['vpsadresse']);
      $vpstel = htmlspecialchars($_POST['vpstel']);
      $vpsmail = htmlspecialchars($_POST['vpsmail']);
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO assos (nomassos, pdtassos, pdtadresse, pdttel, pdttel2, pdtmail, vpsassos, vpsadresse, vpstel, vpsmail) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
         $ins->execute(array($nomassos, $pdtassos, $pdtadresse, $pdttel, $pdttel2, $pdtmail, $vpsassos, $vpsadresse, $vpstel, $vpsmail ));
         $message = 'Votre Association a bien été ajouté';
      } else {
         $update = $bdd->prepare('UPDATE assos SET nomassos = ?, pdtassos = ?, pdtadresse = ?, pdttel = ?, pdttel2 = ?, pdtmail = ?, vpsassos = ?, vpsadresse = ?, vpstel = ?, vpsmail = ?  WHERE id = ?');
         $update->execute(array($nomassos, $pdtassos, $pdtadresse, $pdttel, $pdttel2, $pdtmail, $vpsassos, $vpsadresse, $vpstel, $vpsmail, $edit_id));
         $message = 'Votre assos a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }

?>

<div class="container">
  <h2>Formulaire de mise à jour des assocations</h2>
 
    <form action="" class="was-validated" method="POST">
    <div class="form-group">
      <label for="nomassos">Association:</label>
      <input type="text" class="form-control" id="nomassos" placeholder="nomassos"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['nomassos'] ?>"<?php } ?> name="nomassos" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="pdtassos">Représentant légal:</label>
      <input type="text" class="form-control" id="pdtassos" placeholder="Nom prenom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['pdtassos'] ?>"<?php } ?> name="pdtassos" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="pdtadresse">Adresse:</label>
      <input type="text" class="form-control" id="pdtadresse" placeholder="Adresse"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['pdtadresse'] ?>"<?php } ?> name="pdtadresse" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="pdttel">Telephone:</label>
      <input type="text" class="form-control" id="pdttel" placeholder="Numéro"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['pdttel'] ?>"<?php } ?> name="pdttel" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="pdttel2">Telephone 2:</label>
      <input type="text" class="form-control" id="pdttel2" placeholder="Numéro 2"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['pdttel2'] ?>"<?php } ?> name="pdttel2" >
      
    </div>
    <div class="form-group">
      <label for="pdtmail">Mail:</label>
      <input type="text" class="form-control" id="pdtmail" placeholder="Mail"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['pdtmail'] ?>"<?php } ?> name="pdtmail" >
      
    </div>
    <div class="form-group">
      <label for="vpsassos">Vice-président ou secrétaire :</label>
      <input type="text" class="form-control" id="vpsassos" placeholder=""<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['vpsassos'] ?>"<?php } ?> name="vpsassos" >
      
    </div>
    <div class="form-group">
      <label for="vpsadresse">VP/S Adresse  :</label>
      <input type="text" class="form-control" id="vpsadresse" placeholder=""<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['vpsadresse'] ?>"<?php } ?> name="vpsadresse" >
      
    </div>
    <div class="form-group">
      <label for="vpstel">VP/S Telephone  :</label>
      <input type="text" class="form-control" id="vpstel" placeholder=""<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['vpstel'] ?>"<?php } ?> name="vpstel" >
     
    </div>
    <div class="form-group">
      <label for="vpsmail">VP/S Mail :</label>
      <input type="text" class="form-control" id="vpsmail" placeholder=""<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_assos['vpsmail'] ?>"<?php } ?> name="vpsmail" >
      
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>