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

    <div>
        <div class="imaged">
           <img id="imaged2" src="assets/img/imagesfront1.jpg">    
        </div>
        <div class="mid">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil soluta sequi in error perferendis fuga vero officia unde, tenetur quam natus quibusdam repellat similique dicta libero! Quia iste exercitationem corporis.</p>
        </div>
        <div class="bot">
        </div>
    </div>    
    </body>
</html>
