
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['nsername'])){
	header('Location:addservice.php?error=nname_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['sername'])){
	header('Location:addservice.php?error=name_missing');
	exit;
}

// Vérification que le nom n'est pas déjà utilisé
$req = $bdd->prepare('SELECT nameService FROM service WHERE nameService= ?');
$req->execute(array($_POST['nsername']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : le nom est déjà pris
	header('Location: addservice.php?error=name_taken');
	exit;
}

$name = $_POST['sername'];
$namepost = $_POST['nsername'];

$q = "UPDATE service SET nameService = '$namepost' WHERE nameService = '$name' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:addservice.php');
	exit;
?>