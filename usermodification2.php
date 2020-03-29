<?php session_start() ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// PASSWORD

//Vérification de l'existence du password dans le POST
if(!isset($_POST['profilmotdepasse']) || empty($_POST['profilmotdepasse'])){
	header('Location: user.php?error=password_missing');
	exit;
}

if(strlen($_POST['profilmotdepasse']) <5 || strlen($_POST['profilmotdepasse']) >16){
	header('Location: user.php?error=password_length');
	exit;
}

//Vérification de la confirmation du password
if($_POST['profilmotdepasse'] !== $_POST['profilcmotdepasse']){
	header('Location: user.php?error=password _and_cpassword_different');
	exit;
}
$passwordpost = hash('sha256', $_POST['profilmotdepasse']);
$emailm = $_SESSION['email'];

$q = "UPDATE user SET password = '$passwordpost' WHERE email = '$emailm' ";

$req = $bdd->prepare($q);

$req->execute();

	header('Location: deconnexion.php?verification=ok');
	exit;
?>