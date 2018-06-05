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
$etu ='';
$sql1 = "SELECT * FROM carte WHERE id='".$id."'";
$r=$c->query($sql1);
$carte = $r->fetch(PDO::FETCH_ASSOC);
$ide = $carte['id'];
//echo $ide.'<br>';
$sql2 = "SELECT * FROM etudiant WHERE refEtud='".$carte['refEtu']."'";
$stm = $c->query($sql2);
while($et = $stm->fetch(PDO::FETCH_OBJ)){
    $etu.='<label class="moderns">Nom et Prenom:</label>';
    $etu.='<label class="moderns">'.$et->Nom.' '.$et->Prenom.'</label><br>';
}
$refCarte = $_POST['refCarte'];
$solde = $_POST['solde'];
$carteID = $_POST['carteID'];
$statut = $_POST['statut'];
$sql3 = '';
$person = $_SESSION["user"]["id"];
$file =$refCarte."_". date("Ymds");
if($statut == 0)
    $stat = 'Desactivee';
else $stat = 'Activee';

$details ='Mis a jour de la carte: '.$refCarte.' son statut: '.$stat.' son solde: '.$solde;
if(isset($_POST['modifer'])){
  //  echo "avant";
    $s = $c->exec("UPDATE carte  SET refCarte='".$refCarte."',SoldeCarte='".$solde."',statut = '".$statut."'   WHERE id='".$carteID."' ");
    $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'UPDATE Carte','".$details."')");
    $v = $c->exec("INSERT INTO recu VALUES(NULL,'".$refCarte."',NOW(),'".$solde."','".$file."') ");
    if($v){
        $msg = " La carte a  ete Modifier avec succee ";
       // header( "Refresh:2; url=recu.html?ref='".$refCarte."'");
    }
 //   echo "apres.<br>";
   // echo $carteID .' '.$refCarte.' '.$solde;
  // $st = $s->rowCount();
    header( "Refresh:2; url=recu.html?ref=".$refCarte."&fn=".$file);
  // header( "Refresh:0; url=cartelist.html");
}
$param['carte']=$carte;
$param['etu']=$etu;
//$param = array();
$tpl="modifcarte.twig";