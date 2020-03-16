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
        <h1>Choix du client</h1>
</div>
<div class="preadmin">
<form action="preadminpost.php" method="post">
    <select name="client" class="client">
    <option value="">Choisissez un client</option>

<?php
    include("includes/database.php");

    global $bdd;
    $req = $bdd -> prepare("SELECT * FROM user" );
    $req -> execute();

    $answers = [];
    while($user = $req->fetch()){
        $answers[] = $user;
    }
    foreach($answers as $answers){
        $id = $answers['id'];
        $email = $answers['email'];

        echo '<option value=';
        echo "$id" ;
        echo  '>' ;
        echo $email . '</option>' ;
    }

?>

</select>

<input id="adminbutton" type="submit"  value="Ok"/>
</form>
</div>
</body>
</html>