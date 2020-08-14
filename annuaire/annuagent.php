<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$agent = $bdd->query('SELECT * FROM agent ORDER BY nom ASC');
?>

<a href="../modification/annuagent_m.php"> Ajouter un Agent </a>
<br>
<br>

<table>
   <thead>
		<tr>
		   <th>Contact</th>
		   <th>Modification</th>
		</tr>
	</thead>
   <tbody>
      <tr>   
   <?php while($a = $agent->fetch()) { ?>
   
		<td><?= $a['nom'] ?> <?= $a['prenom'] ?></td>
		<td><a href="../modification/annuagent_m.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="../supprimer/supagent.php?id=<?= $a['id'] ?>">Supprimer</a></td>
		</tr>
      <?php } ?>
   </tbody>
</table>