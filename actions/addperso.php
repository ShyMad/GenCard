<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 13/09/2016
 * Time: 13:50
 */
ini_set("display_errors",0);error_reporting(0);
$username = $_POST['username'];
$pass = $_POST['password'];
$person = $_SESSION["user"]["id"];

$details = 'Ajout de Membre :'.$username;
//echo "ffffff";
if(isset($_POST['ok'])){
   // echo"Hello";
    $r=$c->exec("insert into personnel values (NULL,'test','tet','tet','tesst')");
     $lastid = $c->lastInsertId();
     $r2=$c->EXEC("insert into login VALUES (NULL,'".$lastid."','".$_POST['username']."','".$_POST['password']."','".$_POST['role']."')");
     $h = $c->exec("INSERT INTO historique VALUES(NULL,'".$person."',NOW(),'ADD Membre','".$details."')");
}



$param=array();
$tpl="addperso.twig";