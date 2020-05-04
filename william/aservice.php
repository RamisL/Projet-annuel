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
   <div class="servicebdd">
        <p>Ajoutez un service</p>
        <form action="serviceinsertbdd.php" method="post">
            <input type="text" name="name" placeholder="Nom du service">
            <br><br><input type="text" name="categorie" placeholder="Catégorie">
            <br><br>
            <textarea  name="description" rows="5" cols="33" placeholder="Description"></textarea>
            <br><br>
            <input  type="submit" name="buttunproduit" value="Ajouter"/>
        </form>
    </div>   
</body>
<?php
    include("footer.php");
?>