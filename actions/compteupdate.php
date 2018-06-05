<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 09/09/2016
 * Time: 14:22
 */
//ini_set("display_errors",0);error_reporting(0);
echo "salute ";
$cp ="";
$stm = $c->prepare("
	UPDATE personnel
	SET Nom = ?, Prenom = ?, CIN = ?, Description = ?
	WHERE id = ?
");
//print_r($_POST["nom"]);
echo "salute ";
if(isset($_REQUEST['valider'])) {
    $nom = $_GET["nom"];
    $prenom = $_POST["prenom"];
    $cin = $_POST["cin"];
    echo "salute ";
    echo "hahah".$nom;
    $description = $_POST["description"];
    $id = $_SESSION["user"]["refPersonnel"];
   print_r($nom);
   $cp=$nom;
}
echo "salute ";
/*
if(isset($_POST['valider'])) {
    echo "ptn!";
    $stmt->execute(array($nom,$prenom,$cin,$description,$id));

    if($stm->rowCount()) {
        echo 'success';
    } else {
        echo 'update failed';
    }
    header( "Refresh:0; url=moncompte.html");
}*/
$param["cp"]=$cp;
$tpl="compteupdate.twig";
