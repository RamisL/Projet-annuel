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
        <div class="mid">
		<h1>Demande d'intervention pour:</h1>
		<?php
		   include('includes/database.php');

			global $bdd;
			$q = "SELECT * FROM facture WHERE id = ?";

			$req = $bdd -> prepare($q);
			$req -> execute(array($_GET['id_facture']));

			$answers = [];
			while($facture = $req->fetch()){
				$answers[] = $facture;
			}

			foreach($answers as $answers){
				$q = "SELECT * FROM service WHERE id = ?";
				$req2 = $bdd -> prepare($q);
				$req2 -> execute(array($answers['id_service']));

				$answers2 = [];
				while($service = $req2->fetch()){
					$answers2[] = $service;
				}
				foreach($answers2 as $answers2){
					$nomservice=$answers2['nameService'];
					echo '<p>Nom du service:'.$nomservice.'</p>';
					echo " ";
					}
				$q = "SELECT * FROM devis WHERE id = ? and id_client = ?";
				$req3 = $bdd -> prepare($q);
				$req3 -> execute(array($answers['id_devis'],$answers['id_client']));

				$answers3 = [];
				while($devispaye = $req3->fetch()){
					$answers3[] = $devispaye;
					 }
				
				foreach($answers3 as $answers3){
				  $horaire = $answers3['horaire'];
				  $price = $answers3['prix'];
				  echo '<p>Temps de réalisation :'.$horaire.'h</p>';
				  echo " ";
				  echo '<p>Prix :'.$price.'€</p>';
				  }
                }

			?>
            <form action="interventioninsertbdd.php?id_facture=<?= $_GET['id_facture'] ?>" method="post">
                <p>Date de l'intervention</p>
                <input type="date" class="date_intervention" name="date_intervention" placeholder="Date de demande d'intervention" required>
                <p>Heure de l'intervention</p>
                <input type="time" class="horaire" name="horaire" placeholder="Heure de disponibilité pour l'intervention" required>
				<input type="text" class="" name="addresse" type="text" placeholder="Addresse" required>
				<input type="text" class="" name="postal" type="text" placeholder="Addresse" required>
				<input type="tel" class="" id="phone" name="phone" placeholder="00-00-00-00-00" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required>
                <input class="buttoninterv" id="buttoninterv" type="submit" name="buttoninterv" value="Enregister">

            </form>
        </div>
    </div>    
    </body>
    <?php
    include("footer.php");
?>

</html>
