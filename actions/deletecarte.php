<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 12:25
 */
ini_set("display_errors",0);error_reporting(0);
// TO GET VAR FROM CURRENT LINK :
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
//
$id=$query['id'];
$person = $_SESSION["user"]["id"];

$sql1 = "SELECT * FROM carte WHERE id='".$id."'";
$r=$c->query($sql1);

$carte = $r->fetch(PDO::FETCH_ASSOC);

$ide = $carte['id'];
$refCarte = $carte['refCarte'];

//echo $ide.'<br>';
$sql2 = "SELECT * FROM etudiant WHERE refEtud='".$carte['refEtu']."'";
$stm = $c->query($sql2);

while($et = $stm->fetch(PDO::FETCH_OBJ)){
    $etu.='<label class="moderns">Nom et Prenom:</label>';
    $etu.='<label class="moderns">'.$et->Nom.' '.$et->Prenom.'</label><br>';
}
$carte_id = $_POST['carteID'];
$ref_carte = $_POST['carteRef'];
$details ='Suppression de la carte: '.$carte_id;

if(isset($_POST['yes'])){

    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'DELETE Carte','".$details."')");
    try{
        $r = $c->exec("DELETE FROM `cartenum`.`carte` WHERE `carte`.id=".$carte_id);
    }catch (PDOException $e){
       $msg = $e->getMessage();
        var_dump($msg);
    }

        $msg='la Carte a ete supprimer avec succee';
        header( "Refresh:3; url=cartelist.html", true, 303);


}

if(isset($_POST['no'])){
    header( "Refresh:0; url=cartelist.html");
}
$param['msg']=$msg;
$param['carte']=$carte;
$param['etu']=$etu;
//$param = array();
$tpl="deletecarte.twig";