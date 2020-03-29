<?php session_start(); ?>
<!Doctype html>
<html>

<head>
  <title>Checkout</title>
  <script src="https://js.stripe.com/v3/"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
    include("session.php");
    include("header.php");
    include("chatbot.php");
?>
    <div>
        <form id="subscription-form">
            <div id="card-element" class="MyCardElement">
            <!-- Elements will create input elements here -->
            </div>

            
            <div id="card-errors" role="alert"></div>
            <button type="submit">Subscribe</button>
        <form>
   </div>
<body>
