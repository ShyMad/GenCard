<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 01:26
 */

ini_set("display_errors",0);error_reporting(0);


// TO GET VAR FROM CURRENT LINK :
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
//
$id=$query['id'];
$etu ='';

//echo $id;
$sql1 = "SELECT * FROM etudiant WHERE id='".$id."'";
$r=$c->query($sql1);
$etud = $r->fetch(PDO::FETCH_ASSOC);
$nom = $etud['Nom'];
$prenom = $etud['Prenom'];


$ide = $carte['id'];
//echo $ide.'<br>';
$sql2 = "SELECT * FROM carte WHERE refEtu='".$etud['refEtud']."'";
$stm = $c->query($sql2);
while($et = $stm->fetch(PDO::FETCH_OBJ)){
    $etu.='<label class="moderns">Reference de la carte:</label>';
    if($et)
        $etu.='<label class="moderns">'.$et->refCarte.'</label><br>';
    else
        $etu.='<label class="moderns">aucune carte n\'est ajouter</label><br>';
}

$etuID = $_POST['etuID'];
$refEtud =$_POST['refEtud'];
$person = $_SESSION["user"]["id"];

$details = 'Suppression de student :'.$nom.' '.$prenom.' de reference: '.$refEtud;
if(isset($_POST['yes'])){
    $r = $c->exec("DELETE FROM etudiant WHERE id='".$etuID."'");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'DELETE Etudiant','".$details."')");
    //desactivé la carte si l'on possede
    $s = $c->exec("UPDATE carte SET statut='0' WHERE refEtu ='".$refEtud."'");
    if($r){
        $msg='l\'etudiant a ete supprimer avec succee';
        header( "Refresh:3; url=etdtlist.html", true, 303);
    }

}

if(isset($_POST['no'])){
    header( "Refresh:0; url=etdtlist.html");
}
$param['msg']=$msg;
$param['etud']=$etud;
$param['etu']=$etu;
//$param = array();
$tpl="suppetud.twig";