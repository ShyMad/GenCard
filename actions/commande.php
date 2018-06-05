<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 16/09/2016
 * Time: 23:13
 */
ini_set("display_errors",0);error_reporting(0);
if(isset($_POST['valider'])){

    $ref = $_POST['ref'];
    $solde = $_POST['solde'];
    $prix = $_POST['prix'];
    $refEtud = $_POST['refEtud'];
    $statut = $_POST['statut'];
    //echo$refEtud;
    $person = $_SESSION["user"]["id"];

   // echo $ref.' '.$solde.' '.$prix;

    if(($prix <= $solde) && ($statut > 0)){
        $reste = $solde - $prix;
        $r = $c->exec("UPDATE carte SET SoldeCarte='".$reste."' WHERE refCarte='".$ref."'");
        $s = $c->exec("INSERT INTO commande VALUES(NULL,'".$person."','".$refEtud."','".$prix."')");

        $details='le prix de cette commande est: '.$prix.'DH';
        $update = 'le solde de la carte :'.$ref.' est debitee de '.$prix;
        $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'Commande','".$details."')");
        if($r){
            $up = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'UPDATE','".$update."')");
            $msg ='Commande reuissite!';
            header( "Refresh:1; url=commande.html", true, 303);
            $msg ='Commande reuissite!';
        }
    }else
        $msg ='Solde Est insufisant!!';


}
$param['msg']=$msg;
$tpl="commande.twig";