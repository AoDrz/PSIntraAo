<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_membre = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $edit_membre->execute(array($edit_id));
   if($edit_membre->rowCount() == 1) {
      $edit_membre = $edit_membre->fetch();
   } else {
      die('Erreur : le membre n\'existe pas...');
   }
}
if(isset($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['mail'], $_POST['motdepasse'], $_POST['droit'])) {
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail'])AND !empty($_POST['telephone'])AND !empty($_POST['motdepasse'])AND !empty($_POST['droit'])) {
      
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $mail = htmlspecialchars($_POST['mail']);
      $telephone= htmlspecialchars($_POST['telephone']);
      $motdepasse = sha1($_POST['motdepasse']);
      $droit = htmlspecialchars($_POST['droit']);
      if($mode_edition == 0) {
         $ins = $bdd->prepare('INSERT INTO membres (nom, prenom, mail, telephone, motdepasse, droit) VALUES (?, ?, ?, ?, ?, ?)');
         $ins->execute(array($nom, $prenom, $mail, $telephone, $motdepasse, $droit));
         $message = 'Votre membre a bien été ajouté';
      } else {
         $update = $bdd->prepare('UPDATE membres SET nom = ?, prenom = ?, mail = ?, telephone = ?, motdepasse = ?, droit = ?  WHERE id = ?');
         $update->execute(array($nom, $prenom, $mail, $telephone, $motdepasse, $droit, $edit_id));
         $message = 'Votre membre a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>

<?php require'../element/header.php'; ?>
 
    
   

<div class="container">
  <h2>Formulaire de mise à jour des membres</h2> <a href="../admin/admin.php">Retour à la page d administration </a>
  
  <form action="" class="was-validated" method="POST">
    <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="nom" placeholder="nom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_membre['nom'] ?>"<?php } ?> name="nom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="prenom">Prenom:</label>
      <input type="text" class="form-control" id="prenom" placeholder="prenom"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_membre['prenom'] ?>"<?php } ?> name="prenom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="mail">Mail:</label>
      <input type="text" class="form-control" id="mail" placeholder="mail"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_membre['mail'] ?>"<?php } ?> name="mail" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input type="text" class="form-control" id="telephone" placeholder="telephone"<?php if($mode_edition == 1) { ?> value="<?= 
      $edit_membre['telephone'] ?>"<?php } ?> name="telephone" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <div class="form-group">
      <label for="motdepasse">Mot de passe:</label>
      <input type="password" class="form-control" id="motdepasse" placeholder="Mot de passe" name="motdepasse" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Invalide.</div>
    </div>
    <select class=form-control name="droit">
      <option value=1> Admin</option>
      <option value=2>Rédacteur</option>
      <option value=3>Membre</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



    