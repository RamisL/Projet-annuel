<?php

$idFacture = $_GET['idFacture'];
$idPresta = $_GET['idPresta'];

include('includes/database.php');
global $bdd;

$q = "UPDATE facture SET id_prestataire = ? where id_facture = ?";

$req = $bdd -> prepare($q);
$req -> execute(array(
    htmlspecialchars($idPresta),
    htmlspecialchars($idFacture)
));

$req -> closeCursor();

header("location:affectationList.php");





