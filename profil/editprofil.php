<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
      $insertnom->execute(array($newnom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
      $newprenom = htmlspecialchars($_POST['newprenom']);
      $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newtelephone']) AND !empty($_POST['newtelephone']) AND $_POST['newtelephone'] != $user['telephone']) {
      $newtelephone = htmlspecialchars($_POST['newtelephone']);
      $inserttelephone = $bdd->prepare("UPDATE membres SET telephone = ? WHERE id = ?");
      $inserttelephone->execute(array($newtelephone, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>

<div class="row">
    <div class= "col-sm-3 ">
      <img src=" <?= $user['avatar']; ?>" alt=""> 
    </div>
    <div class="col-sm-6 ">
      
         <h2>Edition de mon profil</h2>
            <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
               <label>nom :</label>
               <input type="text" class="form-control" name="newnom" placeholder="Nom" value="<?php echo $user['nom']; ?>" />
            </div>
            <div class="form-group">
               <label>Prenom :</label>
               <input type="text" class="form-control" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']; ?>" />
            </div>
            <div class="form-group">
               <label>Telephone :</label>
               <input type="text" class="form-control" name="newtelephone" placeholder="00000000" value="<?php echo $user['telephone']; ?>" />
            </div>
            <div class="form-group">
               <label>Mail :</label>
               <input type="text" class="form-control" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" />
            </div>
            <div class="form-group">
               <label>Mot de passe :</label>
               <input type="password" class="form-control" name="newmdp1" placeholder="Mot de passe"/>
            </div>
            <div class="form-group">
               <label>Confirmation - mot de passe :</label>
               <input type="password" class="form-control" name="newmdp2" placeholder="Confirmation du mot de passe" />
            </div>
               <button type="submit"  class="btn btn-success">Envoyer</button>
               
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      
   </div>
    
</div>

   </body>
</html>
<?php   
}
else {
   header("Location: ../session/connexion.php");
}
?>