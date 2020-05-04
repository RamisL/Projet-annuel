<?php
  session_start();
  $connected = isset($_SESSION['email']) ? true : false;
?>
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
?>
    <div>
        <div class="imageBIndex">
        <div class="mid">
          <h1>Votre besoin</h1>
          <form action="devispdf.php" method="post">
            <div>
              <?php
              include('includes/database.php');

                  global $bdd;
                  $q = "SELECT * FROM service";


                  $req = $bdd -> prepare($q);
                  $req -> execute();

                  while($ligne = $req->fetch()) {
                    echo '<label class="">'.$ligne['nameService'].'</label><input type="radio" name="service" value="'.$ligne['nameService'].'"></br>';
                  }
                  ?>
            </div>
            <div>
              <label for="fname">Prenom :</label>
              <input type="text" name="firstname">
            </div>
            </br>
            <div>
              <label for="fname">Nom :</label>
              <input type="text" name="lastname">
            </div>
            </br>
            <div>
              <label for="fname">Téléphone :</label>
              <input type="text" name="tel">
            </div>
            </br>
            <div>
              <label for="fname">Email :</label>
              <input type="text" name="mail">
            </div>
            </br>
            <div>
              <label for="fname">Code postal :</label>
              <input type="text" name="postal">
            </div>
            </br>
            <div>
              <label for="fname">Ville :</label>
              <input type="text" name="city">
            </div>
          </br>
            <div>
              <label for="fname">Temps de réalisation en heure:</label>
              <input type="number" min="4" max="20" name="horaire">
            </div>
          </br>
            <div>
              <input type="submit" name="submit" placeholder="Demander votre devis">
            </div>
          </form>
        </div>
        <div class="bot">
        </div>
    </div>
<?php
    /*include("footer.php")*/
?>
    </body>
</html>
