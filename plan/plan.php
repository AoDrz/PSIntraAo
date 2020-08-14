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
                            <button class="tablinks" onclick="openservice(event, 'plan')" id="defaultOpen">Plan</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'plansect')">Plan Secteur</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'plancircu')">Plan Circulation</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'ajout')">Ajout récent</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'plantel')">Téléchargement</button>
                        </div>
                        <div class="col-2 col-md-12 ">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">

            <div id="plan" class="col-12 tabcontent">
                <h3>Plan</h3>
                <div>
                Supprimer
                </div>
            </div>
            <div id="plansect" class="col-12 tabcontent">
                <h3>Plan Secteur</h3>
                Supprimer
                <div>

                </div>
            </div>
            <div id="plancircu" class="col-12 tabcontent">
                <h3>Plan circulation</h3>
                Supprimer
                <div>

                </div>
            </div>
            <div id="ajout" class="col-12 tabcontent">
                <h3>Ajout récent</h3>
                Supprimer
                <div>

                </div>
            </div>
            <div id="plantel" class="tabcontent">
                <h3>Téléchargement</h3>
                <div>
                Supprimer
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openservice(evt, serviceName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; }
        tablinks = document.getElementsByClassName("tablinks"); for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(serviceName).style.display = "block"; evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>