<?php
session_start();
include('includes/database.php');

$id = $_GET['id'];

$q = "UPDATE devis SET acceptation = 1 WHERE id = '".$id."' ";
$req = $bdd->prepare($q);
$req->execute();

$q = "INSERT INTO facture (id_client,id_prestataire,id_service,id_devis) VALUES (:id_client,:id_prestataire,:id_service,:id_devis)";
$req = $bdd->prepare($q);
$req->execute(array(
  'id_client'=>$_SESSION['id'],
  'id_prestataire'=>'1',
  'id_service'=>'1',
  'id_devis'=>$id
  )
);
header('Location: mydevis.php');
exit;
?>
