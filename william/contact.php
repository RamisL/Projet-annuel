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
    require_once("header.php");
    include("header.php");
    include("session.php");
    include("chatbot.php");
?>

    <div>
        <div class="imageBIndex">
            <div class="mid">
              <h1>Par mail</h1>
              <p>Vous pouvez nous contacter par mail en cas de problème ou pour tout type de question. Une personne vous répondra dans la minute qui suit votre mail.</p>
            </br><p>Mail :
              <a href="mailto:allinone@service.com">allinoneservice@service.com</a>
            </p>
            </div>
            <div class="bot"></div>
            <div class="mid">
              <h1>Par téléphone</h1>
              <p>Vous pouvez nous contacter par téléphone pour nous posez tout type de question ou pour toute modification. Une personne sera à votre écoute 7j/7 24h/24.</p>
            </br><p>Téléphone :
              <a href="tel:01000000">01 00 00 00 00</a>
            </p>
            </div>
            <div class="mid">
              <h1>Par Skype</h1>
              <p>Vous pouvez nous contacter par Skype en cas de problème ou si vous avez besoin d'une visite guidé. Une personne sera à votre écoute 7j/7 24h/24.</p>
            </br><p>Skype :
              <a href="callto:skye_account">All in one</a>
            </p>
            </div>
            <div class="bot"></div>
        </div>

    </div>
    </body>
    <?php include("footer.php") ?>
</html>
