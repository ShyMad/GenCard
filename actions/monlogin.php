<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 08/09/2016
 * Time: 12:48
 */
ini_set("display_errors",0);error_reporting(0);
$cp="";

$r=$c->query("Select * from login where id='".$_SESSION["user"]["refPersonnel"]."'");
$row=$r->fetch(PDO::FETCH_ASSOC);
//if($row['Nom'] == "" || $row['Prenom']==""  || $row['CIN']=="" || $row['description'] == "")
  //  $cp="Vous n'avez pas encore ajoute des informations personnel! ";
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$id = $_SESSION["user"]["refPersonnel"];
$details = 'Mis a jour de Login :'.$username.' mdp :'.$pwd;
if(isset($_POST['modifier'])) {
   //echo "ptn!";
    $stm=$c->exec(" UPDATE login
    SET userName ='".$username."', Password='".$pwd."'
    WHERE id='".$id."'
    ");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$id."',NOW(),'UPDATE LOGIN','".$details."')");


    header( "Refresh:0; url=monlogin.html");
}
if(isset($_POST['annuler'])){
    header("Refresh:0; url=compte.html");
}
//echo "".$_POST["nom"];
// les params :
//$nom="" ; $prenom="" ; $cin="" ; $description=""; $id ="";



$tpl = "monlogin.twig";
$param["row"]=$row;
$param["cp"]=$cp;
/*
*/