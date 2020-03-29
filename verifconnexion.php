<?php
include('includes/database.php');

// EMAIL

//verification de l'existance de l'email dans le post
if(!isset($_POST['lemail']) || empty($_POST['lemail'])){
	header('Location: Connexion.php?error=email_missong');
	exit;
}

//verification du format de l'email
if(!filter_var($_POST['lemail'], FILTER_VALIDATE_EMAIL)){
	header('Location: Connexion.php?error=email_format');
	exit;
}

// PASSWORD

//Vérification de l'existence du password dans le POST
if(!isset($_POST['lpassword']) || empty($_POST['lpassword'])){
	header('Location: Connexon.php?error=password_missing');
	exit;
}

if(strlen($_POST['lpassword']) <5 || strlen($_POST['lpassword']) >16){
	header('Location: Connexion.php?error=password_length');
	exit;
}
// VERIFICATION EXISTANCE UTILISATEUR

// REQUETE PREPAREE (PROTECTION CONTRE L'INJECTION SQL)

$req = $bdd->prepare('SELECT * FROM user WHERE email= :email && password= :password');
$req->execute([
	'email' => htmlspecialchars($_POST['lemail']),
	'password' => hash('sha256', $_POST['lpassword'])
]);
$answers = $req -> fetch();

if(count($answers) > 0){
	session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['email'] = $answers['email'];
		$_SESSION['date'] = $answers['date'];
		header('location:user.php');
		exit;
}
else{

	echo '<body onLoad="alert(\'Membre non reconnu...\')">';
	// puis on le redirige vers la page d'accueil
	echo '<meta http-equiv="refresh" content="0;URL=Connexion.php">';
	exit;
}

?>
