
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// email

//verification de l'existance de l'email dans le post
if(!isset($_POST['nprofilemail'])){
	header('Location:admin.php?error=email_missing');
	exit;
}

//verification du format de l'email
if(!filter_var($_POST['nprofilemail'], FILTER_VALIDATE_EMAIL)){
	header('Location: amdin.php?error=email_format');
	exit;
}

// Vérification que l'email n'est pas déjà utilisé
$req = $bdd->prepare('SELECT email FROM user WHERE email= ?');
$req->execute(array($_POST['nprofilemail']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	header('Location: admin.php?error=email_taken');
	exit;
}

$email = $_POST['profilemail'];
$emailpost = $_POST['nprofilemail'];

$q = "UPDATE user SET email = '$emailpost' WHERE email = '$email' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:preadmin.php');
	exit;
?>