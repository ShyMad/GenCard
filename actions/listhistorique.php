<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 16/09/2016
 * Time: 12:05
 */

ini_set("display_errors",0);error_reporting(0);
$r=$c->query("select * from historique order by id desc");

//echo $nbr['nbr'];
$frm="";
while($row=$r->fetch(PDO::FETCH_ASSOC)){
    $n = $c->query("select * from personnel WHERE id='".$row['refPersonnel']."'");
    $st = $n->fetch(PDO::FETCH_ASSOC);
    $nom = $st['Nom'].' '.$st['Prenom'];

    $frm.='<tr>';
    $frm.='<td>'.$nom.'</td>';
    $frm.='<td>'.$row['date'].'</td>';
    $frm.='<td>'.$row['operation'].'</td>';
    $frm.='<td>'.$row['detail'].'</td>';
    $frm.='</tr>';
}
$param['frm']=$frm;
$param['nbr']=$nbr;
$tpl="listhistorique.twig";