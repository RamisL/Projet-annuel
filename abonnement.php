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

    <div ></div>

    <div class="midab">
        <p class="standard">Abonnement Standard</p>
        <p class="textab">Bénéficiez d'un accès priviligié en illimité 5j/7 de 9h à 20h</p>
        <p class="textab">Service clientèle illimité avec 12 h de service par mois</p>
        <a class="lienp" href="redirectionpaye.php">En savoir plus</a>

    </div>
    <div class="midab">
        <p class="familial">Abonnement Familial</p>
        <p class="textab">Bénéficiez d'un accès priviligié en illimité 6j/7 de 9h à 20h</p>
        <p class="textab">Service clientèle illimité avec 25 h de service par mois</p>
        <a class="lienp" href="redirectionpaye.php">En savoir plus</a>
    </div>
    
    <div class="midab">
        <p class="prenium">Abonnement Prenium</p>
        <p class="textab">Bénéficiez d'un accès priviligié en illimité 7j/7 24/24</p>
        <p class="textab">Service clientèle illimité avec 50 h de service par mois</p>
        <a class="lienp" href="redirectionpaye.php">En savoir plus</a>
    </div>
</div>
</body>