<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 14/09/2016
 * Time: 13:29
 */
ini_set("display_errors",0);error_reporting(0);
$sql1 = "select * from carte ORDER BY  id";
$r=$c->query($sql1);
//echo $nbr['nbr'];
$frm="";
while($row=$r->fetch(PDO::FETCH_ASSOC)){
    $frm.='<tr>';
        $frm.='<td>'.$row['refCarte'].'</td>';
        $frm .= '<td>' . $row['refEtu'] . '</td>';
        $etd = $c->query("select * from etudiant where refEtud='".$row['refEtu']."'");
            while($etud=$etd->fetch(PDO::FETCH_ASSOC)) {
                $frm .= '<td>' . $etud['Nom'] . '</td>';
                $frm .= '<td>' . $etud['Prenom'] . '</td>';
            }
        $frm.='<td>'.$row['SoldeCarte'].' DH </td>';
    if($row['statut'] == 1) $statut = 'A';
    else $statut = 'D';
        $frm.='<td>'.$statut.'</td>';
        $frm.='<td><a href="modifcarte.html?id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/update.png" height="30" width="30"></a>&emsp;
                   <a href="deletecarte.html?id='.$row['id'].'"><img style="margin-left:25px;padding:5px" src="Css/images/delete.png" height="30" width="30"></a>
               </td>';
    $frm.='</tr>';
}
$param['frm']=$frm;
//$param['nbr']=$nbr;
$tpl="cartelist.twig";