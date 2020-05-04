<?php

include('includes/database.php');


if(!isset($_POST['date_intervention']) || empty($_POST['date_intervention'])){
	header('Location: intervention.php?error=date_intervention');
	exit;
}
if(!isset($_POST['horaire']) || empty($_POST['horaire'])){
	header('Location: intervention.php?error=horaire');
	exit;
}
if(!isset($_POST['addresse']) || empty($_POST['addresse'])){
	header('Location: intervention.php?error=addresse');
	exit;
}
if(!isset($_POST['postal']) || empty($_POST['postal'])){
	header('Location: intervention.php?error=postal');
	exit;
}
if(!isset($_POST['phone']) || empty($_POST['phone'])){
	header('Location: intervention.php?error=phone');
	exit;
}
 global $bdd;
$id_facture= $_GET['id_facture'];

	$q = "SELECT * FROM facture WHERE id = ?";


    $req = $bdd -> prepare($q);
    $req -> execute(array($id_facture);

	$answers = [];
    while($facture = $req->fetch()){
        $answers[] = $facture;
    }

	$q = "SELECT * FROM devis WHERE id = ?";
        $req2 = $bdd -> prepare($q);
        $req2 -> execute(array($answers['id_devis']));

        $answers2 = [];
        while($devispaye = $req2->fetch()){
            $answers2[] = $devispaye;
        }


    $q = "INSERT INTO intervention (id_devis,date,horaire,duree,id_prestataire,id_facture) VALUES (:id_devis,:date,:horaire,:duree,:id_prestataire,:id_facture)"


    $req = $bdd -> prepare($q);
    $req->execute(array(
	'id_devis' => $answers['id_devis'],
	'date' => $_POST['date_intervention'],
	'horaire' => $_POST['horair'],
	'duree' => $answers2['horaire'],
	'id_prestataire' => $id_plan ,
	'id_facture'=>$id_facture
	)
);

		header('Location: intervention.php?verification=ok');
		exit;
?>