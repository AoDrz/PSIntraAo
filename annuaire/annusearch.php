<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$agent = $bdd->query('SELECT * FROM agent  ORDER BY nom ASC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $agent = $bdd->query('SELECT * FROM agent  WHERE nom LIKE "%'.$q.'%" ORDER BY nom ASC');
   if($agent->rowCount() == 0) {
      $agent = $bdd->query('SELECT * FROM agent   WHERE CONCAT(nom, prenom, mail ) LIKE "%'.$q.'%" ORDER BY nom ASC');
   }
}

$elu = $bdd->query('SELECT * FROM elu  ORDER BY nom ASC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $elu = $bdd->query('SELECT * FROM elu  WHERE nom LIKE "%'.$q.'%" ORDER BY nom ASC');
   if($elu->rowCount() == 0) {
      $elu = $bdd->query('SELECT * FROM elu   WHERE CONCAT(nom, prenom, groupe, fonction, telelu, mailelu) LIKE "%'.$q.'%" ORDER BY nom ASC');
   }
}

$assos = $bdd->query('SELECT * FROM assos  ORDER BY nomassos ASC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $assos = $bdd->query('SELECT * FROM assos  WHERE nomassos LIKE "%'.$q.'%" ORDER BY nomassos ASC');
   if($assos->rowCount() == 0) {
      $assos = $bdd->query('SELECT * FROM assos   WHERE CONCAT(nomassos, pdtassos, pdtadresse, pdttel, pdttel2, pdtmail) LIKE "%'.$q.'%" ORDER BY nomassos ASC');
   }
}


?>
<head>
<link rel="stylesheet" href="../css/annu.css">

</head>

<div class="d-flex justify-content-center" > 
    <form method="GET" id="search">
    <input id="testbar" type="search" name="q" nom='research' placeholder="Recherche..." />
    <input  type="submit" value="recherche"  />
    </form>
</div>

<div>
 <?php if($agent->rowCount() > 0) { ?>
 <table>
   <thead>
		<tr>  <h5>Agent:</h5>
		   <th>Contact</th>
		   <th>E-mail</th>
			<th>Telephone</th>
         <th>Tel-Poste</th>
         <th>Service</th>
		</tr>
	</thead>
   <tbody>
      <tr>   
   <?php while($a = $agent->fetch()) { ?>
   
			<td><?= $a['nom'] ?> <?= $a['prenom'] ?></td>
			<td><?= $a['mail'] ?></td>
			<td><?= $a['tel'] ?></td>
         <td><?= $a['telposte'] ?></td>
         <td>X</td>
		</tr>
      <?php } ?>
   </tbody>
</table>
   <?php } else { ?>
   Aucun résultat pour: <?= $q ?> dans les agents <br>
   <?php } ?>
</div>
<br><br>
<div>
   <?php if($elu->rowCount() > 0) { ?>
<table>
   <thead>
		<tr> <h5>Elu:</h5>
		   <th>Contact</th>
         <th>Fonction</th>
		   <th>E-mail</th>
			<th>Telephone</th>
		</tr>
	</thead>
   <tbody>
      <tr>     
      <?php while($b = $elu->fetch()) { ?>
         <td><?= $b['nom'] ?> <?= $b['prenom'] ?></td>
         <td><?= $b['fonction'] ?></td>
			<td><?= $b['mailelu'] ?></td>
			<td><?= $b['telelu'] ?></td>
		</tr>
      <?php } ?>
   </tbody>
</table>
   <?php } else { ?>
   Aucun résultat pour: <?= $q ?> dans les élus <br>
   <?php } ?>

</div>
<br><br>
<div>
   <?php if($assos->rowCount() > 0) { ?>
<table>
   <thead>
		<tr> <h5>Association:</h5>
		   <th>Association</th>
		   <th>President</th>
         <th>Adresse</th>
         <th>Telephone</th>
         <th>Telephone 2</th>
         <th>E-mail</th>
		</tr>
	</thead>
   <tbody>
      <tr>   
      <?php while($c = $assos->fetch()) { ?>
         <td><?= $c['nomassos'] ?></td>
			<td><?= $c['pdtassos'] ?></td>
         <td><?= $c['pdtadresse'] ?></td>
         <td><?= $c['pdttel'] ?></td>
         <td><?= $c['pdttel2'] ?></td>
         <td><?= $c['pdtmail'] ?></td>
		</tr>
      <?php } ?>
      </tbody>
</table>  
   <?php } else { ?>
   Aucun résultat pour: <?= $q ?> dans les assos <br>
   <?php } ?>
</div>