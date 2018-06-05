<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 16/09/2016
 * Time: 13:47
 */

ini_set("display_errors",0);error_reporting(0);

// TO GET VAR FROM CURRENT LINK :
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
//
$id=$query['id'];
$per ='';

//echo $id;
$sql1 = "SELECT * FROM login WHERE refPersonnel='".$id."'";
$r=$c->query($sql1);
$pers = $r->fetch(PDO::FETCH_ASSOC);
/*
$sql2 = "SELECT * FROM personnel WHERE id='".$id."'";
$st = $c->query($sql2);
$stm = $st->fe
*/
$refP = $_POST['refP'];
$username = $pers['username'];
$person = $_SESSION["user"]["id"];

$details = 'Suppression de Membre :'.$username;

if(isset($_POST['yes'])){
    if($refP == $_SESSION["user"]["refPersonnel"]){
        $msg='Vous risquer de supprimer votre propre compte, demande invalide!';
        header("Refresh:3; url=listpersonnels.html", true, 303);
    }
    else {
        $r = $c->exec("DELETE FROM login WHERE refPersonnel='" . $refP . "'");
        $d = $c->exec("DELETE FROM personnel where id='" . $refP . "'");
        $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'Delete Membre','".$details."')");
        if ($r) {
            $msg = 'cet membre a ete supprime avec succee';
            header("Refresh:3; url=listpersonnels.html", true, 303);
        }
    }


}

if(isset($_POST['no'])){
    header( "Refresh:0; url=listpersonnels.html");
}

$param['pers']=$pers;
$param['msg']=$msg;
//$param = array();
$tpl="deletepersonnel.twig";