<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>insertimg</title>
</head>
<body>
<?php
    include("header.php");
    include("session.php");
?>
    <div class="servicebdd">
        <p>Ajoutez un service</p>
        <form action="produitinsertbdd.php" method="post">
            <input type="text" name="name" placeholder="Nom du service">
            <br><br><input type="text" name="categorie" placeholder="Catégorie">
            <br><br>
            <textarea  name="description" rows="5" cols="33" placeholder="Description"></textarea>
            <br><br>
            <input  type="submit" name="buttunproduit" value="Ajouter"/>
        </form>
    </div>   
    <div class="admin"> 
        <p>Administration des clients :</p>
        <form action="preadmin.php">  
        <input type="submit" value="click"/>
        </form>
    </div>
</body>
</html>