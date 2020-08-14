<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>Au Divan</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="p1" class="col-sm-6">
                <div class="col-sm-12">
                    <h1 class="titre">
                        <span id="t1">Au menu </span> <br> <span id='t2'>du divan </span>
                    </h1>
                </div>
                <div class="offset-3 col-sm-6">
                    <div class="row ">
                        <?php  require'session/conect.php'; ?>
                    </div>
                </div>
                <div id="canap" class="col-sm-12 ">
                    <h2 id="piedcanap"></h2>
                </div>
            </div>
            <div id="p2" class="col-sm-6">
                
                
                </div>
            </div>

        </div>

    </div>

    <footer>

    </footer>
</body>

</html>

