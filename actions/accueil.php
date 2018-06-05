<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 04/09/2016
 * Time: 21:53
 */
//print_r($_SESSION["user"]);
$r=$c->query("Select * from login where id='".$_SESSION["user"]["id"]."'");
$row=$r->fetch(PDO::FETCH_ASSOC);
$va = $row['userName'];

// select nombres de cartes

$sql1  ="select count(*) as num from carte";
$stm1 = $c->query($sql1);
$result1 = $stm1->fetch(PDO::FETCH_ASSOC);
$carte = $result1['num'];


// select nombres de personnels

$sql2 = "select count(*) as num from personnel";
$stm2 = $c->query($sql2);
$result2 = $stm2->fetch(PDO::FETCH_ASSOC);
$pers = $result2['num'];

// select nombres des etudiants

$sql3 = "select count(*) as num from etudiant";
$stm3 = $c->query($sql3);
$result3 = $stm3->fetch(PDO::FETCH_ASSOC);
$etd = $result3['num'];

$var = "Hello";


$param["etd"]=$etd;
$param["pers"]=$pers;
$param["carte"]=$carte;
$param["var"]=$var;
$param["va"]=$va;
$tpl="accueil.twig";