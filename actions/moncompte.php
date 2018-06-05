<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 08/09/2016
 * Time: 12:48
 */
ini_set("display_errors",0);error_reporting(0);
$cp="";
$nom = $_POST['nom'];
$pm = $_POST['prenom'];
$cin = $_POST['cin'];

$description = $_POST['description'];
$id = $_SESSION['user']['refPersonnel'];
$details = 'Nom: '.$nom.' Prenom: '.$prenom.' CIN: '.$cin.' Description: '.$description;
if(isset($_POST['modifier'])) {
  // echo "ptn!";
   $stm=$c->exec("UPDATE personnel
                  SET Nom ='".$nom."' , Prenom ='".$pm."', CIN = '".$cin."', Description = '".$description."'
	              WHERE id = '".$id."'"
   );
   $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$id."',NOW(),'UPDATE Compte','".$details."')");

   header("Refresh:0; url=moncompte.html");
}
if(isset($_POST['annuler'])){
   header("Refresh:0; url=compte.html");
}


$r=$c->query("Select * from personnel where id='".$_SESSION["user"]["refPersonnel"]."'");
$ro=$r->fetch(PDO::FETCH_ASSOC);
if($ro['Nom'] == "" || $ro['Prenom']==""  || $ro['CIN']=="" || $ro['description'] == "")
   $cp="Vous n'avez pas encore ajoute des informations personnel! ";



//echo "".$_POST["nom"];
// les params :
//$nom="" ; $prenom="" ; $cin="" ; $description=""; $id ="";

$tpl = "moncompte.twig";
$param["ro"]=$ro;
$param["cp"]=$cp;
/*
*/