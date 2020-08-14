<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../js/fonction.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <title>Au Divan</title>
</head>

<body>
<?php require'../element/verifco.php'; ?>
<div class="jumbotron">
        <div class="container-fluid">
            <div class="row">    
                <div class="offset-10 col-sm-2 ">
                <div class="minimenu">
                    <a onclick="openNav()" > <i class="material-icons"> account_circle </i> </a>
                    <a onclick="openMenu()"  > <i class="material-icons"> dialpad </i> </a>
                </div>
                </div>
            </div>
        </div>
    
    <div>
        <h1>Bienvenue <?php echo $_SESSION['prenom']; ?> </h1>
    </div>
</div>

<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="material-icons">clear</i></a>
        <a href="#"><img id="ava" src="<?php echo $_SESSION['avatar'] ?>" alt=""></a>
        <a href="../profil/profil.php"><i class="material-icons">assignment_ind</i> <?php echo $_SESSION['prenom']; ?></a>
        <a href="../profil/editprofil.php">  <i class="material-icons">create</i> Modifier</a>
        <a href="../session/deconnexion.php">Déconnexion  </a>
    </div>

    <div id="mySidemenu" class="sidemenu">
        <a href="javascript:void(0)" class="=closebtn2" onclick = "closeMenu()">&times; Fermer</a>
        
            <a href="../annuaire/annuaire.php"><img src="../image/bl01.png" alt=""></a>
            <a href="../agenda/agenda.php"><img src="../image/j03.png" alt=""></a>
           <!-- <a href="../faq/faq.php"><img src="../image/v04.png" alt=""></a> -->
            <a href="../plan/plan.php"><img src="../image/v05.png" alt=""></a>
            <a href="../partage/partage.php"><img src="../image/rg10.png" alt=""></a>
           <!-- <a href="../stockage/stockage.php"><img src="../image/j11.png" alt=""></a> -->
        
    </div>