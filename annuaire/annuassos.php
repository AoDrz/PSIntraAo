<?php
$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
$assos = $bdd->query('SELECT * FROM assos ORDER BY nomassos ASC');
?>

<a href="../modification/annuassos_m.php"> Ajouter une Association </a>
<br>
<br>

<table>
   <thead>
		<tr>
		    <th>Association</th>
		    <th>Modification</th>
		</tr>
	</thead>
   <tbody>
      <tr>   
      <?php while($c = $assos->fetch()) { ?>
        <td><?= $c['nomassos'] ?></td>
		<td><a href="../modification/annuassos_m.php?edit=<?= $c['id'] ?>">Modifier</a> | <a href="../supprimer/supassos.php?id=<?= $c['id'] ?>">Supprimer</a></td>
		</tr>
      <?php } ?>
      </tbody>
</table>  