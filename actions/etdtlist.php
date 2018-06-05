<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 02:45
 */
ini_set("display_errors",0);error_reporting(0);
$r=$c->query("select * from etudiant order by id desc");
$n = $c->query("select count(*) as nbr from etudiant");
$nbr = $n->fetch(PDO::FETCH_ASSOC);
$data =  $nbr['nbr'];
$line = 1;
$frm="";
while($row=$r->fetch(PDO::FETCH_ASSOC)){
    $frm.='<tr id="'. $line++ .'">';
    $frm.='<td>'.$row['refEtud'].'</td>';
    $frm.='<td>'.$row['Nom'].'</td>';
    $frm.='<td>'.$row['Prenom'].'</td>';
    $frm.='<td>'.$row['Etablissement'].'</td>';
    $frm.='<td>'.$row['Filiere'].'</td>';
    $frm.='<td><a href="modifetud.html?&id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/update.png" height="30" width="30"></a>&emsp;
               <a href="suppetud.html?&id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/delete.png" height="30" width="30"></a>
           </td>';
    $frm.='</tr>';
}
$param['frm']=$frm;
$param['nbr']=$nbr;
//$param['page']=$page;
$tpl="etdtlist.twig";