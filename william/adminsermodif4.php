
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['nimg2'])){
	header('Location:addservice.php?error=nimg1_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['img2'])){
	header('Location:addservice.php?error=img1_missing');
	exit;
}


$img2 = $_POST['img2'];
$img2post = $_POST['nimg2'];

$q = "UPDATE service SET img2 = '$img2post' WHERE img2 = '$img2' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:addservice.php');
	exit;
?>