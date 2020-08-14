<?php session_start();
?>

<?php require'../element/header.php'; ?>

<?php require'../element/menunav.php'; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-3 tab">
                    <div class="row">
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'agenda')" id="defaultOpen">Agenda</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'magc')">Mag C</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'mic')">MIC</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'centreiffel')">Centre Effel</button>
                        </div>
                        <div class="col-2 col-md-12 ">  
                            <button class="tablinks" onclick="openservice(event, 'salle')">Salle</button>
                        </div>
                        <div class="col-2 col-md-12 ">  
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                    <div id="agenda" class="col-12 tabcontent">
                        <h3>Agenda</h3>
                        <div>
                        Supprimer
                        </div>
                    </div>
                    <div id="magc" class="col-12 tabcontent">
                        <h3>Mag C</h3>
                        <div>
                        Supprimer
                        </div>
                    </div>
                    <div id="mic" class="col-12 tabcontent">
                        <h3>M.I.C</h3>
                        <div>
                        Supprimer
                        </div>
                    </div>
                    <div id="centreiffel" class="col-12 tabcontent">
                        <h3>Centre Effel</h3>
                            <div>
                            Supprimer
                            </div>
                    </div>
                    <div id="salle" class="col-12 tabcontent">
                        <h3>Salle</h3>
                        <div>
                        Supprimer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("defaultOpen").click();
</script>
