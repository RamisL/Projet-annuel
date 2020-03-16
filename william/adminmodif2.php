<?php session_start() ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');
global $id;
// PASSWORD

//Vérification de l'existence du password dans le POST
if(!isset($_POST['profilmotdepasse']) || empty($_POST['profilmotdepasse'])){
	header('Location: preadmin.php?error=password_missing');
	exit;
}

if(strlen($_POST['profilmotdepasse']) <5 || strlen($_POST['profilmotdepasse']) >16){
	header('Location: preadmin.php?error=password_length');
	exit;
}

//Vérification de la confirmation du password
if($_POST['profilmotdepasse'] !== $_POST['profilcmotdepasse']){
	header('Location: preadmin.php?error=password _and_cpassword_different');
	exit;
}
$passwordpost = hash('sha256', $_POST['profilmotdepasse']);

$q = "UPDATE user SET password = '$passwordpost' WHERE id = '$id' ";

$req = $bdd->prepare($q);

$req->execute();

	header('Location: preadmin.php?verification=ok');
	exit;
?>