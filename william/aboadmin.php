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
<div class="adminabo">
    <div class="titleadminabo">
            <h1>Page Admistration</h1>
    </div>
    <?php
        include("includes/database.php");

        global $bdd;
        $q = "SELECT * FROM typeabonnement WHERE id = ?";


        $req = $bdd -> prepare($q);
        $req -> execute(array($_GET["idabonnement"]));

        $answers = [];
        while($abo = $req->fetch()){
            $answers[] = $abo;
        }
    
        foreach($answers as $answers){
        $id = $answers['id'];
        $name = $answers['nameAbo']; 
        $acces = $answers['acces'];
        $time = $answers['timeAbo'];


        
        echo '<div class="mid">';

            //name
            echo '<div class="nameAbo">';
            echo "Nom de l'abonnement : ";
            echo '<form action="adminabomodif1.php" method="post">';
            echo '<input class="aboname" id="aboname" name="aboname" type="text" value="';
            echo $name;
            echo '"   >';
            echo '<input type="text" class="naboname" id="naboname" name="naboname" placeholder="nouveau nom">' ;
            echo '<input class="inputename" id="inputename" type="submit" name="Name" value="Modifier">';
            echo '</form>';
            echo '</div>' ;
            
            //
            echo '<div class="accesAbo">';
            echo "Acces de l'abonnement : ";
            echo '<form action="adminabomodif2.php" method="post">';
            echo '<textarea  name="aboacces" rows="5" cols="33" role="textbox" >' . "$acces" . '</textarea>';
            echo '<textarea  class="naboacces" name="naboacces" rows="5" cols="33" paceholder="Définiser les acces">' . '</textarea>';
            echo '<input class="inputeacces" id="inputeaboacces" type="submit" name="Acces" value="Modifier">';
            echo '</form>';
            echo '</div>' ;
           
           
            echo '<div class="timeAbo">';
            echo "Acces de l'abonnement : ";
            echo '<form action="adminabomodif3.php" method="post">';
            echo '<textarea  name="abotime" rows="5" cols="33" role="textbox" placeholder="Définiser les acces">' . "$time" . '</textarea>';
            echo '<textarea  class="nabotime" name="nabotime" rows="5" cols="33" paceholder="Définiser les acces">' . '</textarea>';
            echo '<input class="inputeacces" id="inputeaboacces" type="submit" name="Acces" value="Modifier">';
            echo '</form>';
            echo '</div>' ;

            echo '<div class=buttonsupprabo>';
            echo '<h2>' . "Supprimer abonnement" . '</h2>';
            echo '<br>';
            echo '<form action="removeabonnement.php" method="post">';
            echo '<input ' . 'type="submit"' . 'name="id"' . 'value="' . $id . '"   >';
            echo '</form>';
            echo '</div>';

        }
    ?>
</div>
</body>
<?php
    include("footer.php");
?>
</html>