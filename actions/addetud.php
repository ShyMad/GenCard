<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 01:26
 */
ini_set("display_errors",0);error_reporting(0);

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$gsm = $_POST['gsm'];
$ref = $_POST['ref'];
$etab = $_POST['etab'];
$fil = $_POST['filiere'];
$dateNaiss = $_POST['dateNaiss'];
$annee = $_POST['annee'];
$person = $_SESSION["user"]["id"];

$details = 'Ajout de student :'.$nom.' '.$prenom.' de reference: '.$ref;
if(isset($_POST['ajouter'])) {
    $stm = $c->exec("
            INSERT INTO etudiant
            VALUES(NULL,'".$ref."','".$nom."','".$prenom."','".$etab."','".$fil."','".$dateNaiss."','".$gsm."','".$annee."')
         ");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'ADD Etudiant','".$details."')");
    if($stm){
        $msg = " L'étudiant a été ajouté avec succé ";
    }else
        $msg = "Echec de l'ajout !!";
    header( "Refresh:2; url=addetud.html");
}
$param['msg']=$msg;
$tpl="addetud.twig";