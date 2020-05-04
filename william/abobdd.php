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
?>
   <div class="servicebdd">
        <p>Ajoutez un abonnement</p>
        <form action="abonnementinsertbdd.php" method="post">
            <input type="text" name="nameAbo" placeholder="Nom du service">
            <br><br>
            <textarea  name="acces" rows="5" cols="33" placeholder="Définiser les acces"></textarea>
            <br><br>
            <textarea  name="timeAbo" rows="5" cols="33" placeholder="Définiser le temps de service par mois"></textarea>
            <br><br>
            <input name="price"  placeholder="Définiser montant ">
            <br><br>
            <input  type="submit" name="buttunproduit" value="Ajouter"/>
        </form>
    </div> 
    <div class="preabo">
        <form action="preabopost.php" method="post">
            <select name="selectabo" class="selectabo">
            <option value="">Choisissez un Abonnement</option>

            <?php
            include("includes/database.php");

            global $bdd;
            $req = $bdd -> prepare("SELECT * FROM typeabonnement");
            $req -> execute();

            $answers = [];
            while($user = $req->fetch()){
                $answers[] = $user;
            }
            foreach($answers as $answers){
                $id = $answers['id'];
                $name = $answers['nameAbo'];

                echo '<option value=';
                echo "$id" ;
                echo  '>' ;
                echo $name . '</option>' ;
            }

            ?>

            </select>

            <input id="abobutton" type="submit"  value="Ok"/>
        </form>
</div>
</body>

</html>
