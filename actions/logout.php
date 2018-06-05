<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 05/09/2016
 * Time: 19:23
 */
$var ='';
$var = $_SESSION['user']['userName'];
unset($_SESSION['user']);

header( "Refresh:5; url=connexion.html", true, 303);
$tpl="logout.twig";
$param["var"]=$var;
