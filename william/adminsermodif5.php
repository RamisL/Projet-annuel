
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['nprice'])){
	header('Location:addservice.php?error=nname_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['price'])){
	header('Location:addservice.php?error=name_missing');
	exit;
}

$price = $_POST['price'];
$pricepost = $_POST['nprice'];

$q = "UPDATE service SET price = '$pricepost' WHERE price = '$price' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:addservice.php');
	exit;
?>