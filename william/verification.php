<?php
include('includes/database.php');

// email

//verification de l'existance de l'email dans le post
if(!isset($_POST['email'])){
	header('Location: Connexion.php?error=email_missing');
	exit;
}

//verification du format de l'email
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('Location: Connexion.php?error=email_format');
	exit;
}

// Vérification que l'email n'est pas déjà utilisé
$req = $bdd->prepare('SELECT email FROM user WHERE email= ?');
$req->execute(array($_POST['email']));
// Parcourir la réponse de la bdd
$answers = [];
while($user = $req->fetch()){
	$answers[] = $user;
} 
if(count($answers) != 0){ // le tableau n'est pas vide : l'email est déjà pris
	header('Location: Connexion.php?error=email_taken');
	exit;
}

// PASSWORD

//Vérification de l'existence du password dans le POST
if(!isset($_POST['password']) || empty($_POST['password'])){
	header('Location: Connexion.php?error=password_missing');
	exit;
}

if(strlen($_POST['password']) <5 || strlen($_POST['password']) >20){
	header('Location: Connexion.php?error=password_length');
	exit;
}

//Vérification de la confirmation du password
if($_POST['password'] !== $_POST['cpassword']){
	header('Location: Connexion.php?error=password _and_cpassword_different');
	exit;
}

// BIRTHDAY
if(!isset($_POST['birthday']) || empty($_POST['birthday'])){
	header('Location: Connexion.php?error=birthday_missing');
	exit;
}
// GENDER
if(!isset($_POST['gender']) || empty($_POST['gender'])){
	header('Location: Connexion.php?error=gender_missing');
	exit;
}
// COUNTRY
if(!isset($_POST['country']) || empty($_POST['country'])){
	header('Location: Connexion.php?error=country_missing');
	exit;
}
// INSERTION DU NOUVEL UTILISATEUR

// REQUETE PREPAREE (PROTECTION CONTRE L'INJECTION SQL)
$q = "INSERT INTO user (email,password,birthday,gender,country) VALUES (:email,:password,:birthday,:gender,:country)";

$req = $bdd->prepare($q);



$req->execute(array(
	'email' => $_POST['email'],
	'password' => hash('sha256', $_POST['password']),
	'birthday' => $_POST['birthday'],
	'gender' => $_POST['gender'],
	'country' => $_POST['country']
	)
);
		header('Location: verification.php?verification=ok');
		exit;
?>