
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['naboacces'])){
	header('Location:aboadmin.php?error=naboacces_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['aboacces'])){
	header('Location:aboadmin.php?error=aboacces_missing');
	exit;
}

// Vérification que le nom n'est pas déjà utilisé
$req = $bdd->prepare('SELECT acces FROM typeabonnement WHERE acces= ?');
$req->execute(array($_POST['naboacces']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : le nom est déjà pris
	header('Location: aboadmin.php?error=acces_taken');
	exit;
}

$acces = $_POST['aboacces'];
$accespost = $_POST['naboacces'];

$q = "UPDATE typeabonnement SET acces = '$accespost' WHERE acces = '$acces' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:abobdd.php');
	exit;
?>