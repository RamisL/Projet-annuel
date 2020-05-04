<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> HomeService </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
include("header.php");
include("session.php");
include("chatbot.php");

?>

<div id="backgroundabimage">


    <?php
    include('includes/database.php');

    global $bdd;
    $id = $_GET["idFacture"];
    $q = "Select * FROM prestataire";

    $req = $bdd -> prepare($q);
    $req -> execute();

    while($ligne = $req->fetch()) {

        echo "<a href='affectationreq.php?idFacture=".$id."&idPresta=".$ligne['id']."'> Affecter".$ligne['facture.id']." ".$ligne['nom']." ".$ligne['prenom']." pour cette intervention</a>";

    }
    ?>
</div>
</body>
<?php
include("footer.php");
?>
</html>
