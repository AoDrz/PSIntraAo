<?php
session_start(); 

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['telephone'] = $userinfo['telephone'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['droit'] = $userinfo['droit'];
         $_SESSION['avatar'] = $userinfo['avatar'];
         header("Location: ./accueil/accueil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<div class="fconnect">
<form method="POST" action="">
  <div class="form-group">
    <label>Identifiant</label>
    <input type="email" class="form-control"  name="mailconnect" placeholder="Entrer votre Mail">
    <hr>
    
  </div>
  <div class="form-group">
    <label >Mot de passe</label>
    <input type="password" class="form-control"  name="mdpconnect" placeholder="Entrer votre Mot de passe">
    <hr>
  </div>
  <div class="btnconnect">
  <button type="submit" name="formconnexion" class="btn btn1 ">CONNEXION</button> <button class="btn btn2 " ><a href="session/inscription.php"> INSCRIPTION </a></button>
  </div>
</form>

<?php
if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
    }
?>
<br>
</div>
