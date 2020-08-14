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
                        <div class="col-4 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'recherche')" id="defaultOpen">Recherche </button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'agent')">Agent </button>
                        </div>
                        <div class="col-2 col-md-12 ">
                            <button class="tablinks" onclick="openservice(event, 'elu')">Elu </button>
                        </div>
                        <div class="col-2 col-md-12">
                            <button class="tablinks" onclick="openservice(event, 'assos')">Assos </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div id="recherche" class="col-12 tabcontent">
                            <?php require 'annusearch.php';?>
                        </div>
                        <div id="agent" class="col-12 tabcontent">
                            <?php require 'annuagent.php'; ?>
                        </div>
                        <div id="elu" class="col-12 tabcontent">
                            <?php require 'annuelu.php'; ?>
                        </div>
                        <div id="assos" class="col-12 tabcontent">
                            <?php require 'annuassos.php'; ?>
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