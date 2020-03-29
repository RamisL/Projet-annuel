<?php
session_start ();
if($_SESSION['email'] != NULL){
    header('location:payement.php');
}else{
    header('location:Connexion.php');
}
?>