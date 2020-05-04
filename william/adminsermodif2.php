
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['nserdesc'])){
	header('Location:addservice.php?error=nname_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['serdesc'])){
	header('Location:addservice.php?error=name_missing');
	exit;
}

// Vérification que le nom n'est pas déjà utilisé
$req = $bdd->prepare('SELECT descService FROM service WHERE descService= ?');
$req->execute(array($_POST['nserdesc']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : le nom est déjà pris
	header('Location: addservice.php?error=name_taken');
	exit;
}

$desc = $_POST['serdesc'];
$descpost = $_POST['nserdesc'];

$q = "UPDATE service SET descService = '$descpost' WHERE descService = '$desc' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:addservice.php');
	exit;
?>