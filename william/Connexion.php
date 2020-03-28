<?php session_start();

if(isset($_POST['captcha'])) {
	if($_POST['captcha'] !== $_SESSION['captcha'])
	 {
	   echo "Captcha valide";
	} else {
	   echo "Captcha invalide";
	}
 }
 
 ?> 
 
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Connexion </title>
    <link rel="stylesheet" href="style.css">
</head>

<body> 

<?php
	include("header.php");
	include("session.php");
?>	
	<div class="conteneur">
		<div class="inscription">
			<h1>Inscription</h1>
			<form action="verification.php" method="post">
				<input type="text" name="email" placeholder="E-mail">
				<br><br>
				<input type="password" name="password" placeholder="Mot de passe">
				<br><br>
				<input type="password" name="cpassword" id="cpassword" placeholder="Confirmer votre Mot de passe" required>
				<br><br>
				<input type="date" name="birthday" placeholder="Date de naissance">
				<br><br>
				<label>Homme:</label><input type="radio" name="gender" value="man"><br>
				<label>Femme:</label><input type="radio" name="gender" value="woman">
				<br><br>
				<select name="country">
					<option value="">Choisissez un pays</option>
					<option value="FR">France</option>
					<option value="ES">Espagne</option>
					<option value="IT">Italie</option>
					<option value="PO">Portugal</option>
				</select>
				<br><br>

				<img src="indexcaptcha.php" />
				<input  type="text" name="captcha" placeholder="Confirmer Captcha" /><br><br>
				<input  type="submit" name="envoyer" value="S'inscrire"/>
				
			</form>
		</div>
	</div>

		<div class="Connexion">
			<h1>Connexion</h1>
			<form action="verifconnexion.php" method="post">
				<input type="text" name="lemail" placeholder="E-mail">
				<br><br>
				<input type="password" name="lpassword" placeholder="Mot de passe">
				<br>
				<br><br> 
				<input type="submit" name="submit_button" value="Se connecter">
			</form>
		</div>

 	</div>
</body>

    
</html>
