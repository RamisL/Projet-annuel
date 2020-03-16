<?php session_start() ?>
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
<div class="adminh1">
        <h1>Page Admistration</h1>
</div>
<?php
    include("includes/database.php");

    global $bdd;
    $q = "SELECT * FROM user WHERE id = ?";


    $req = $bdd -> prepare($q);
    $req -> execute(array($_GET["idclient"]));

    $answers = [];
    while($user = $req->fetch()){
        $answers[] = $user;
    }
   
    foreach($answers as $answers){
    $id = $answers['id'];
    $email = $answers['email']; 
    $password = $answers['password'];
    $birthday = $answers['birthday'];
    $gender = $answers['gender'];
    $country = $answers['country'];

    
    echo '<div class="mid">';

        //Email
        echo '<div class="email">';
        echo "Adresse mail : ";
        echo '<form action="adminmodif.php" method="post">';
        echo '<input id="profilemail" name="profilemail" type="text" value="';
        echo $email;
        echo '"  disabled="disabled"  role="textbox" aria-disabled="true" aria-readonly="false">';
        echo  '<input type="text" id="nprofilemail" name="nprofilemail" placeholder="nouvelle E-mail">' ;
        echo '</div>' ;
        echo '<input id="inputadresse" type="submit" name="Mail" value="Modifier"/>';
        echo '</form>';

        //Password
        echo '<div class="password">';
        echo "$password" . '<br><br>';
        echo "Modifier le mot de passe : ";
        echo '</div>';
        echo '<form action="adminmodif2.php" method="post">';
        echo '<input id="profilmotdepasse" name="profilmotdepasse" type="password" placeholder="Mot de passe" role="textbox">' .'<br><br>';
        echo '<input id="profilcmotdepasse" name="profilcmotdepasse" type="password" placeholder="Confirmation mot de passe" role="textbox">';
        echo '<input id="inputmotdepasse" type="submit" name="Mot passe" value="Modifier"/>' ;
        echo  $id;
        echo '</form>';
        
        //Birthday
        echo '<div class="birthday">';
        echo "Date de naissance : ";
        echo '<input  name="profilbirthday" type="text" value="' ;
        echo $birthday;
        echo '"  disabled="disabled"  role="textbox" aria-disabled="true" aria-readonly="false">' . '<br><br>';
        echo '<form action="usermodification4.php" method="post">';
        echo '<input type="date" name="birthday" placeholder="Date de naissance">';
        echo '<input id="inputbirthday" type="submit" name="Mail" value="Modifier"/>';
        echo '</div>';
        echo '</form>';

        //Gender
        echo '<div class="gender">';
        echo "Civilité : ";
        echo '<input  name="profilgender" type="text" value="' ;
        echo $gender; 
        echo '"  disabled="disabled"  role="textbox" aria-disabled="true" aria-readonly="false">'. '<br><br>';
        echo '<form action="usermodification4.php" method="post">';
        echo '<label>Homme:</label><input type="radio" name="gender" value="man">' . '<br>';
        echo  '<label>Femme: </label><input type="radio" name="gender" value="woman">';
        echo '<input id="inputgender" type="submit" name="Mail" value="Modifier"/>';
       echo '</form>';
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
        echo '</div>';
        
    }
?>
</body>
</html>