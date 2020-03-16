<?php session_start(); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
<?php
    include("includes/database.php");
    if($_SESSION['email'] == NULL){
        header('location:redirectionconnexion.php');
		exit;
    }
else{
    global $bdd;
    $req = $bdd -> prepare("SELECT * FROM user WHERE email=?");
    $req -> execute(array($_SESSION['email']));
    $answers = $req->fetch();
    
    if(!empty($answers) && isset($answers)){
        $email = $answers['email'];
        $password = $answers['password'];
        $birthday = $answers['birthday'];
        $gender = $answers['gender'];
        $country = $answers['country'];
        echo '<div class="mid">';
        echo '<p class="inf">Vos informations :' . '</p>';
        
        //Email
        echo '<div class="email">';
        echo "Votre adresse mail : ";
        echo '<form action="usermodification1.php" method="post">';
        echo '<input id="profilemailu" name="profilemail" type="text" value="';
        echo $email;
        echo '" "role="textbox">';
        echo '</div>' ;
        echo '<input id="inputadresseu" type="submit" name="Mail" value="Modifier"/>';
        echo '</form>';

        //Password
        echo '<div class="password">';
        echo "Modifier votre mot de passe : ";
        echo '</div>';
        echo '<form action="usermodification2.php" method="post">';
        echo '<input id="profilmotdepasseu" name="profilmotdepasse" type="password" placeholder="Mot de passe" role="textbox">' .'<br><br>';
        echo '<input id="profilcmotdepasseu" name="profilcmotdepasse" type="password" placeholder="Confirmation mot de passe" role="textbox">';
        echo '<input id="inputmotdepasseu" type="submit" name="Mot passe" value="Modifier"/>' ;
        echo '</form>';
        
        //Birthday
        echo '<div class="birthday">';
        echo "Date de naissance : ";
        echo '<input  name="profilbirthday" type="text" value="' ;
        echo $birthday;
        echo '"  disabled="disabled"  role="textbox" aria-disabled="true" aria-readonly="false">';
        echo '</div>';

        //Gender
        echo '<div class="gender">';
        echo "Civilité : ";
        echo '<input  name="profilgender" type="text" value="' ;
        echo $gender; 
        echo '"  disabled="disabled"  role="textbox" aria-disabled="true" aria-readonly="false">';
        echo '</div>';

        //Country
        echo '<div class="country">';
        echo "Votre nationalité : ";
        echo $country . '<br><br>';
        echo '<form action="usermodification3.php" method="post">';
        echo '   <select name="profilcountry">';
        echo '<option value="">' . "Choisissez un pays" .'</option>';
        echo '<option value="FR">' . "France" .'</option>'; 
        echo '<option value="ES">' . "Espagne" .'</option>';
        echo '<option value="IT">' . "Italie" .'</option>'; 
        echo '<option value="PO">' . "Portugal" .'</option>';
        echo '</select>';
        echo '</div>'; 
        echo '<input id="inputcountry" type="submit" name="Country" value="Modifier"/>' ;
        echo '</form>';
        
        //bouton deco
        echo '<div class="deconnexion">' .  '<form action="deconnexion.php">' . '<input type="submit" value="Déconnexion"/>';
        echo '</form>' . '</div>';
    }
}
?>
</body>
</html>