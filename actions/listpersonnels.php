<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 16/09/2016
 * Time: 12:09
 */
ini_set("display_errors",0);error_reporting(0);
$r=$c->query("select * from personnel order by id desc");

//echo $nbr['nbr'];
$frm="";
while($row=$r->fetch(PDO::FETCH_ASSOC)){
    $n = $c->query("select role from login WHERE refPersonnel='".$row['id']."'");
    $st = $n->fetch(PDO::FETCH_ASSOC);
    if($st['role'] ==3 )$statut = 'Super Admin';
    elseif($st['role'] == 2) $statut = 'Member';
    $frm.='<tr>';
    $frm.='<td>'.$row['Nom'].'</td>';
    $frm.='<td>'.$row['Prenom'].'</td>';
    $frm.='<td>'.$row['CIN'].'</td>';
    $frm.='<td>'.$statut.'</td>';
    $frm.='<td>'.$row['description'].'</td>';
    $frm.='<td><a href="modifpersonnel.html?&id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/update.png" height="30" width="30"></a>&emsp;
               <a href="deletepersonnel.html?&id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/delete.png" height="30" width="30"></a>
           </td>';
    $frm.='</tr>';
}
$param['frm']=$frm;
$param['nbr']=$nbr;
$tpl="listpersonnels.twig";