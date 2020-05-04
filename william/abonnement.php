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

    <?php  if($_SESSION['keyadmin'] != 0 && $_SESSION['keyadmin'] != NULL && $_SESSION['keyadmin'] != 2 )
    {
        echo '<div class=buttonmodifabo>';
        echo '<h2>' . "Modifier abonnement" . '</h2>';
        echo '<br>';
        echo '<button>';
        echo '<a href="abobdd.php">';
        echo "click"; 
        echo '</a>'; 
        echo '</button>';
        echo '</div>';
    }
    ?>
    <?php if($_SESSION['aboactive']==NULL){ 
        $_SESSION['aboactive']=0;
    }
    ?>
    <?php if($_SESSION['aboactive']==1){ ?>
      <p> Vous avez un abonnement actif</p>
    <?php } ?>
    <?php
    include('includes/database.php');

        global $bdd;
        $q = "SELECT * FROM typeabonnement";


        $req = $bdd -> prepare($q);
        $req -> execute();
                
        while($ligne = $req->fetch()) {


        echo '<div class="midab">' ;
        echo '<p class="premium">';
        echo $ligne["nameAbo"];
        echo '</p>' ;
        echo '<p class="textab">';
        echo $ligne["acces"];
        echo '</p>';
        echo '<p class="textab">';
        echo $ligne["timeAbo"];
        echo '</p>';
        echo '<a class="lienp" href="redirectionpaye.php?abo=' . $ligne['nameAbo'] . '">';
        echo "En savoir plus";
        echo '</a>';
        echo '</div>';
    }
    ?>
</div>
</body>
<?php
    include("footer.php");
?>
</html>