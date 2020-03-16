<?php session_start() ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');

// COUNTRY
if(!isset($_POST['profilcountry']) || empty($_POST['profilcountry'])){
	header('Location: Connexion.php?error=country_missing');
	exit;
}
$countrypost = $_POST['profilcountry'];
$emailm = $_SESSION['email'];

$q = "UPDATE user SET country = '$countrypost' WHERE email = '$emailm' ";

$req = $bdd->prepare($q);

$req->execute();

	header('Location: user.php?verification=ok');
	exit;
?>