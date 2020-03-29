<?php session_start() ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');

// email

//verification de l'existance de l'email dans le post
if(!isset($_POST['profilemail'])){
	header('Location:user.php?error=email_missing');
	exit;
}

//verification du format de l'email
if(!filter_var($_POST['profilemail'], FILTER_VALIDATE_EMAIL)){
	header('Location: user.php?error=email_format');
	exit;
}

// Vérification que l'email n'est pas déjà utilisé
$req = $bdd->prepare('SELECT email FROM user WHERE email= ?');
$req->execute(array($_POST['profilemail']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	header('Location: user.php?error=email_taken');
	exit;
}

$emailpost = $_POST['profilemail'];
$emailm = $_SESSION['email'];

$q = "UPDATE user SET email = '$emailpost' WHERE email = '$emailm' ";

$req = $bdd->prepare($q);

$req->execute();

	header('Location: deconnexion.php?verification=ok');
	exit;
?>