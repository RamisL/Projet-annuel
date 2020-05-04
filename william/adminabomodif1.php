
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['naboname'])){
	header('Location:aboadmin.php?error=nname_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['aboname'])){
	header('Location:aboadmin.php?error=name_missing');
	exit;
}

// Vérification que le nom n'est pas déjà utilisé
$req = $bdd->prepare('SELECT nameAbo FROM typeabonnement WHERE nameAbo= ?');
$req->execute(array($_POST['naboname']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : le nom est déjà pris
	header('Location: aboadmin.php?error=name_taken');
	exit;
}

$name = $_POST['aboname'];
$namepost = $_POST['naboname'];

$q = "UPDATE typeabonnement SET nameAbo = '$namepost' WHERE nameAbo = '$name' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:abobdd.php');
	exit;
?>