<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 20/01/2017
 * Time: 14:29
 */

//require("phpToPDF.php");

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
//
$id=$query['ref'];
$fn=$query['fn'];

$sql1 = "SELECT refEtu from carte where refCarte='".$id."'";

$sql3 = "Select * from recu where ref_carte='".$id."' and file_name='".$fn."'";


$r1=$c->query($sql1);
$ref_etu = $r1->fetch(PDO::FETCH_ASSOC);

$sql2 = "Select * from etudiant where refEtud='".$ref_etu['refEtu']."'";

$r2=$c->query($sql2);
$r3=$c->query($sql3);

$recu = $r3->fetch(PDO::FETCH_ASSOC);
$etu = $r2->fetch(PDO::FETCH_ASSOC);

//info de l'etudiant

$nomEtu = $etu['Nom']." ".$etu['Prenom'];
$filiere = $etu['Filiere'];
$refEtu = $etu['refEtud'];

// info de la carte:

$Montant = $recu['solde'];
$ref_carte = $id;
$date_recu = $recu['date_recue'];
$nom_recu = $fn;





$param['nomEtu']=$nomEtu;
$param['filiere']=$filiere;
$param['refEtu']=$refEtu;
$param['Montant']=$Montant;
$param['refCarte']=$ref_carte;
$param['date'] = $date_recu;
$param['nomRecu']=$nom_recu;

// get the test.php for this from upload
/*
$file_name=$fn.'.pdf';
//Set Your Options -- see documentation for all options
//ob_start();
//include('test.html');
//$my_html = ob_get_clean();
$pdf_options = array(
    "source_type" => 'html',
    "source" => $my_html,
    "action" => 'save',
    "page_size" => 'A5',
    "save_directory" =>  app_path().'../upload',
    "file_name" => $file_name);

//Code to generate PDF file from options above
phptopdf($pdf_options);
*/

$tpl="recu.twig";