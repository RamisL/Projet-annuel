
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('includes/database.php');


// name

//verification de l'existance du nom dans le post
if(!isset($_POST['nabotime'])){
	header('Location:aboadmin.php?error=nabotime_missing');
	exit;
}
//verification de l'existance du nom dans le post
if(!isset($_POST['abotime'])){
	header('Location:aboadmin.php?error=aboacces_missing');
	exit;
}

$time = $_POST['abotime'];
$timepost = $_POST['nabotime'];

$q = "UPDATE typeabonnement SET timeAbo = '$timepost' WHERE timeAbo = '$time' ";

$req = $bdd->prepare($q);

$req->execute();

	header('location:abobdd.php');
	exit;
?>