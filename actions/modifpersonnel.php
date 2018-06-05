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

$username = $_POST['username'];
$pwd = $_POST['password'];
$role = $_POST['role'];
$refP = $_POST['refP'];
$person = $_SESSION["user"]["id"];

$details = 'Mis a jours de Membre :'.$username;

if(isset($_POST['modifier'])){

    $stm = $c->exec("UPDATE login SET userName='".$username."', Password='".$pwd."',role ='".$role."' where refPersonnel ='".$refP."' ");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'UPDATE Membre','".$details."')");
        if($stm){
            $msg ='L\'update c\'est fait avec succe';
             header( "Refresh:2; url=listpersonnels.html", true, 303);
        }
        else header( "Refresh:0; url=listpersonnels.html");


}


$param['pers']=$pers;
$param['msg']=$msg;
//$param = array();
$tpl="modifpersonnel.twig";