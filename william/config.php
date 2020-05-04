<?php
    if (!isset($_SESSION['lang']))
        $_SESSION['lang'] = "fr";
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        if ($_GET['lang'] == "fr"){
            $_SESSION['lang'] = "fr";
        }
        if ($_GET['lang'] == "es")
            $_SESSION['lang'] = "es";
        if ($_GET['lang'] == "en")
            $_SESSION['lang'] = "en";
    }
    require_once "languages/" . $_SESSION['lang'] . ".php";
?>