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
          <h1>Jardinage</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <?php if(!$connected){ ?>
            <a class="link" href="noaccount.php">Faire une demande de devis</a>
          <?php } else{ ?>
            <a class="link" href="devis.php">Faire une demande de devis</a>
          <?php } ?>
            <br>
            <a class="link" href="tarif.php">Tarifs</a>
            <a class="link" href="WebGLService/examples/WebGLService.php">WebGL</a>
        </div>
        <div class="bot">
        </div>
    </div>
<?php
    /*include("footer.php")*/
?>
    </body>
      <?php include("footer.php") ?>
</html>
