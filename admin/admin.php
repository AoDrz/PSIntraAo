<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=mairiev2;charset=utf8", "root", "");
if($_SESSION['droit'] == '1'){ 
    $ix = 'madmin';
    echo 'Administrateur ' ;
    
}elseif($_SESSION['droit'] == '2'){
    $ix = 'm2admin';
    echo 'Rédacteur';
    
}else{
    header('Location: ../accueil/accueil.php');
};

$jointure_memb="
    SELECT
    membres.id, membres.nom, membres.prenom, droit.titre, membres.mail, membres.datenaissance
FROM
    membres
    LEFT JOIN droit
    ON droit.id = membres.droit
ORDER BY 
    nom ASC
";

$membres= $bdd->prepare($jointure_memb);
$membres->execute();


$article = $bdd->query('SELECT * FROM articles ORDER BY titre ASC');


$flash = $bdd->query('SELECT * FROM flash ORDER BY id DESC');


?>


<head>
<link rel="stylesheet" href="../css/admin.css">
</head>

<?php require'../element/header.php'; ?>



<div class= "<?= $ix ?>" >
<br><h1>Gestion Membres</h1><br>

<table> 
    <thead>
		<tr>
		    <th>Contact</th>
            <th>Accès</th>
            <th>Mail</th>
            <th>Anniversaire</th>
			<th>Modification</th>
		</tr>
	</thead>
    <tbody>
        <tr>     
        <?php while ($m = $membres->fetch()) { ?>
            <td><?= $m['nom'] ?> <?= $m['prenom'] ?> </td>
            <td><?= $m['titre'] ?></td>
            <td><?= $m['mail'] ?></td>
            <td><?= $m['datenaissance'] ?></td>
            <td><a href="../modification/membre_m.php?edit=<?= $m['id'] ?>">Modifier</a> | <a href="../supprimer/supmembre.php?id=<?= $m['id'] ?>">Supprimer</a></td>
        </tr>
      <?php } ?>
   </tbody>
</table>
</div>

<br><h1>Gestion Flash info</h1><br>

<a href="../modification/flash_m.php">Ajout d'un flash info</a>
<br><br>

<table> 
    <thead>
		<tr>
            <th>Message</th>
			<th>Modification</th>
            <th>Suppression</th>
		</tr>
	</thead>
    <tbody>
        <tr>     
        <?php while ($f = $flash->fetch()) { ?>
            <td><?= $f['messages'] ?></td>
            <td><a href="../modification/flash_m.php?edit=<?= $f['id'] ?>">Modifier</a> </td>
            <td><a href="../supprimer/supflash.php?id=<?= $f['id'] ?>">Supprimer</a></td>
        </tr>
      <?php } ?>
   </tbody>
</table>
</div>


<br><h1>Gestion Magazine</h1><br>

<a href="../nouvelle/redaction.php">Ajouter un article </a>
<br><br>

<table> 
    <thead>
		<tr>
		    <th>Titre</th>
            <th>Date</th>
            <th>Date modification</th>
            <th>Modification</th>
			<th>Suppression</th>
		</tr>
	</thead>
    <tbody>
        <tr>     
        <?php while( $a = $article->fetch()){ ?>
            <td><?= $a['titre'] ?></td>
            <td><?= $a['datetimepublic'] ?></td>
            <td><?= $a['datetimedit'] ?></td>
            <td><a href="../nouvelle/redaction.php?edit=<?= $a['id'] ?>">Mofication</a></td>
            <td><a href="../supprimer/suparticle.php?id=<?= $a['id'] ?>">Supprimmer</a></td>
        </tr>
      <?php } ?>
   </tbody>
</table>


 


