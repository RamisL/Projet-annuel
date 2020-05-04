
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
	header('Location:addservice.php?error=ndesc_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['serdesc'])){
	header('Location:addservice.php?error=desc_missing');
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