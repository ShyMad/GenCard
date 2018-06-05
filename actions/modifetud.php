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
$person = $_SESSION["user"]["id"];



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

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$gsm = $_POST['gsm'];
$ref = $_POST['ref'];
$etab = $_POST['etab'];
$fil = $_POST['filiere'];
$dateNaiss = $_POST['dateNaiss'];
$annee = $_POST['annee'];
$etuID = $_POST['etuID'];
//echo $etuID;
$sql3 = '';
$details = 'Mis a jour de student :'.$nom.' '.$prenom.' de reference: '.$ref;
if(isset($_POST['modifier'])){
    //echo "avant";
    $s = $c->exec("UPDATE etudiant
            SET refEtud='".$ref."',Nom='".$nom."' ,Prenom='".$prenom."' , Etablissement='".$etab."' ,Filiere='".$fil."' ,datenaiss='".$dateNaiss."' ,gsm='".$gsm."' ,annee='".$annee."'
             WHERE id='".$etuID."' ");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'UPDATE Etudiant','".$details."')");
    //   echo "apres.<br>";
   // echo $carteID .' '.$refCarte.' '.$solde;
    // $st = $s->rowCount();

    header( "Refresh:0; url=etdtlist.html");
}
$param['etud']=$etud;
$param['etu']=$etu;
//$param = array();
$tpl="modifetud.twig";