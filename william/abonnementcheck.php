<?php
session_start();
include('includes/database.php');

$emailm = $_SESSION['email'];

$q = "UPDATE user SET aboactive = 1 WHERE email = '".$emailm."' ";
echo $q;
$req = $bdd->prepare($q);
$req->execute();

$_SESSION['aboactive']=1;


$q = "INSERT INTO abonnement (id_client,categorie,prix,duree,firstname,lastname,city,postal,country,phone) VALUES(:id_client,:categorie,:prix,:duree,:firstname,:lastname,:city,:postal,:country,:phone)";
$req = $bdd->prepare($q);
$req->execute(array(
  'id_client'=>$_SESSION['id'],
  'categorie'=>$_GET['abo'],
  'prix'=>$_GET['price'],
  'duree'=>"30",
  'firstname'=>$_POST['firstname'],
  'lastname'=>$_POST['lastname'],
  'city'=>$_POST['city'],
  'postal'=>$_POST['address'],
  'country'=>$_POST['country'],
  'phone'=>$_POST['tel']
  )
);
header('Location: abonnement.php');
exit;
?>
