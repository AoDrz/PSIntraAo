<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$elu = $bdd->query('SELECT * FROM elu ORDER BY nom ASC');
?>

<a href="../modification/annuelu_m.php"> Ajouter un Elu </a>
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
      <?php while($b = $elu->fetch()) { ?>
        <td><?= $b['nom'] ?> <?= $b['prenom'] ?> </td>
		<td><a href="../modification/annuelu_m.php?edit=<?= $b['id'] ?>">Modifier</a> | <a href="../supprimer/supelu.php?id=<?= $b['id'] ?>">Supprimer</a></td>
		</tr>
      <?php } ?>
   </tbody>
</table>