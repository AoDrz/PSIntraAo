<?php
if(isset($_SESSION['id']) AND !empty($_SESSION['id']) ){ 
    echo 'vous êtes identifié ' ;

}else{
    header('Location: ../index.php');
};
?>