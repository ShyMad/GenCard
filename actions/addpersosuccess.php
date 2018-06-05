<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 13/09/2016
 * Time: 17:17
 */

if(isset($_POST['add'])){
    echo"Hello";
    //$r=$c->execute("insert into personnel values (NULL,'test','tet','tet','tesst')");
    // $lastid = $c->lastInsertId();
    // $r2=$c->EXEC("insert into login VALUES (NULL,'".$lastid."','".$_POST['username']."','".$_POST['password']."','".$_POST['role']."')");
}

$param=array();
$tpl="addpersosuccess.twig";