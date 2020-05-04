<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> HomeService </title>
    <link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script src="indextrad.js"></script>
</head>

<body>
<?php
    include("header.php");
    include("session.php");
    include("chatbot.php");
?>

    <div class="imageBIndex">
        <div class="brr">
            <br>
            <div class="mid">
                <span id="midText" key="intro" class="midText">
                <?php
				echo $lang['indexMid'];
			    ?>
                </span>
            </div>

            <div class="bot"></div>

        </div>

    </div>    
    </body>
    <?php
    include("footer.php");
?>

</html>
