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
    $q = "SELECT facture.id, devis.id FROM devis INNER JOIN facture ON devis.id = facture.id_devis and facture.id_prestataire is NULL";

    $req = $bdd -> prepare($q);
    $req -> execute();

    while($ligne = $req->fetch()) {

        echo "<a href=affection.php?idFacture=".$ligne['facture.id']."> affecter le prestataire pour le devis n°".$ligne['devis.id']."</a>";


    }
    ?>
</div>
</body>
<?php
include("footer.php");
?>
</html>
