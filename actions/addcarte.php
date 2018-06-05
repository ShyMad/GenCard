<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 12:24
 */
//require ("phpToPDF.php");
ini_set("display_errors",0);error_reporting(0);

$opt='';
$msg ='';
$refCarte = $_POST['refCarte'];
$solde = $_POST['solde'];
$refEtd = $_POST['refEtd'];
$statut = $_POST['statut'];
$person = $_SESSION["user"]["id"];

$sql1 = "SELECT Nom,Prenom,refEtud FROM etudiant";
$sql2 = "INSERT INTO carte VALUES (NULL,'".$refCarte."','".$solde."','".$refEtd."','".$statut."')";
$r = $c->query($sql1);
$stat='';
if($statut == 0)
    $stat = 'Desactivee';
else $stat = 'Activee';
$details ='Ajout de la carte: '.$refCarte.' son statut: '.$stat;

while($row = $r->fetch(PDO::FETCH_OBJ)){
    $opt .='<option value='.$row->refEtud.'>'.$row->Nom.' '.$row->Prenom.'</option>';
}
$file =$refCarte."_". date("Ymds");
if(isset($_POST['ajouter'])){
    try{
        $stm = $c->exec($sql2);
        $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'ADD Carte','".$details."')");
        $v = $c->exec("INSERT INTO recu VALUES(NULL,'".$refCarte."',NOW(),'".$solde."','".$file."') ");
        if($stm){
            $msg = " La carte a  ete ajoutee avec succee ";
            header( "Refresh:2; url=recu.html?ref=".$refCarte."&fn=".$file);
        }else
            $msg = "Echec de l'ajout !!";
        header( "Refresh:2; url=addcarte.html");
    }catch (PDOException $e){
        $msg = "Echec de l'ajout !!, la reference de la carte existe deja!";
    }

}
// ajout du fichier pdf




$param['msg']=$msg;
$param['opt']=$opt;
$tpl="addcarte.twig";