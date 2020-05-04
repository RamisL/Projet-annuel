<?php
session_start();
include('includes/database.php');

require('pdf/FPDF/fpdf.php');

$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$city=$_POST['city'];
$mail=$_POST['mail'];
$postal=$_POST['postal'];
$phone=$_POST['tel'];
$service=$_POST['service'];
$horaire=$_POST['horaire'];

$q = "SELECT * FROM service WHERE nameService = '".$service."'";
$req_service = $bdd -> prepare($q);
$req_service -> execute();
$servicereq= $req_service->fetch();

$q = "INSERT INTO devis (id_service,date_validite,horaire,prix,id_client) VALUES(:id_service,:datevalidite,:horaire,:prix,:id_client)";
$req = $bdd->prepare($q);
$req->execute(array(
  'id_service'=>$servicereq['id'],
  'datevalidite'=>date("Y-m-d",strtotime('+30 day')),
  'horaire'=>$_POST['horaire'],
  'prix'=>$servicereq['price']*$horaire,
  'id_client'=>$_SESSION['id']
  )
);

class PDF extends FPDF
{
// En-tête
function Header()
{
    $firstname=$_POST['firstname'];
    // Logo
    $this->Image('pdf/img/logo.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(70);
    // Titre
    $this->Cell(50,10,"Bonjour $firstname",1,0,'C');
    $this->Ln(10);
    $this->Cell(200,10,"Merci pour avoir demander un devis.",0,1,'C');
    // Saut de ligne
    $this->Ln(15);
}

}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('','B',18);
$pdf->Cell(50,10,"Information de votre devis :",0,1,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',12);

$pdf->Cell(50,10,"Service :");
$pdf->Cell(65,10,$service);
$pdf->Ln(10);

$pdf->Cell(50,10,"Temps de la tache :");
$pdf->Cell(65,10,$horaire . "h");
$pdf->Ln(10);

$pdf->Cell(50,10,"Prenom :");
$pdf->Cell(65,10,$firstname);
$pdf->Ln(10);

$pdf->Cell(50,10,"Nom :");
$pdf->Cell(65,10,$lastname);
$pdf->Ln(10);

$pdf->Cell(50,10,"Ville :");
$pdf->Cell(65,10,$city);
$pdf->Ln(10);

$pdf->Cell(50,10,"Code postal :");
$pdf->Cell(65,10,$postal);
$pdf->Ln(10);

$pdf->Cell(50,10,"Mail :");
$pdf->Cell(65,10,$mail);
$pdf->Ln(10);

$pdf->Cell(50,10,"Telephone :");
$pdf->Cell(65,10,$phone);
$pdf->Ln(15);

$pdf->SetFont('','B',18);
$pdf->Cell(50,10,"Voici l'estimation de ce qui devra etre paye :",0,1,'L');
$pdf->Ln(5);

$pdf->SetFont('Times','',12);

$pdf->Cell(30,10,"Description :");
$pdf->Cell(60,10,"Le produit");
$pdf->Cell(30,10,"Prix :");
$pdf->Cell(30,10,$servicereq['price']*$horaire." Euros");

$filename = "C:/Users/Lenovo/Desktop/PA2020/azi.pdf";
//$pdf->Output($filename,'D');
$pdf->Output();


?>
