<?php
include('includes/database.php');

//verification de l'existance de du nom dans le post
if(!isset($_POST['nameAbo'])){
	header('Location: abobdd.php?error=nameAbo_missing');
	exit;
}
if(!isset($_POST['acces'])){
	header('Location: abobdd.php?error=textacces_missing');
	exit;
}

if(!isset($_POST['timeAbo'])){
	header('Location: abobdd.php?error=texttime_missing');
	exit;
}

require_once 'stripe/init.php';
\Stripe\Stripe::setApiKey('sk_test_Qo562miwoXV3WkUsZjnHvFam00LfhqlXou');

$intent=\Stripe\Plan::create([
  'amount' => $_POST['price']*100,
  'currency' => 'eur',
  'interval' => 'month',
  'nickname' => $_POST['nameAbo'],
  'product' => 'prod_HCRir3PQ3fMRzy',
]);

$id_plan = "$intent->id"; 
echo $id_plan ;
// REQUETE PREPAREE (PROTECTION CONTRE L'INJECTION SQL)
$q = "INSERT INTO typeabonnement (nameAbo,acces,timeAbo,price,id_plan) VALUES (:nameAbo,:acces,:timeAbo,:price,:id_plan)";

$req = $bdd->prepare($q);



$req->execute(array(
	'nameAbo' => $_POST['nameAbo'],
	'acces' => $_POST['acces'],
	'timeAbo' => $_POST['timeAbo'],
	'price' => $_POST['price'],
	'id_plan' => $id_plan  
	)
);

	header('Location: abobdd.php?verification=ok');
	exit;
?>
