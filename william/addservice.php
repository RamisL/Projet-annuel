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
        <form action="serviceinsertbdd.php" method="post">
            <input type="text" name="nameService" placeholder="Nom du service">
            <br><br>
            <textarea  name="descService" rows="5" cols="33" placeholder="Description"></textarea>
            <br><br>
            <input type="text" name="img1" placeholder="image indexService">
            <br><br>
            <input type="text" name="img2" placeholder="image service">
            <br><br>
            <input type="numbers" name="price" placeholder="Prix du service">
            <br><br>
            <input  type="submit" name="buttunproduit" value="Ajouter"/>
        </form>
    </div>   
    <div class="admin"> 
        <p>Administration des services :</p>
        <form action="preserpost.php" method="post">
            <select name="selectser" class="selectabo">
            <option value="">Choisissez un Service</option>

            <?php
            include("includes/database.php");

            global $bdd;
            $req = $bdd -> prepare("SELECT * FROM service");
            $req -> execute();

            $answers = [];
            while($user = $req->fetch()){
                $answers[] = $user;
            }
            foreach($answers as $answers){
                $id = $answers['id'];
                $name = $answers['nameService'];

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