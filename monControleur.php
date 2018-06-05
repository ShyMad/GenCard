<?php
session_start();

require_once("twig/lib/Twig/Autoloader.php");

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("templates");
 $c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=cartenum','root','');
		if(!$c) die("erreur connexion");
$c->exec('SET NAMES utf8');//pour le resultat d'apres la bd;
$c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



/*$twig = new Twig_Environment($loader, array(
	"cache" => false
));
 */

$twig = new Twig_Environment($loader, array(
  //  'cache' => 'tmp_cache',
   'cache' => false,
    'autoescape'=>true
));


$actions=array("result"=>0,"accueil"=>1,"aide"=>0,"connexion"=>0,'monhistory'=>2,'historylist'=>3,'history'=>2,"compteupdate"=>2,"monlogin"=>2,"logout"=>1,"etudiants"=>3,"addperso"=>3,'commande'=>2,"historique"=>2,"monhistorique"=>2,"listhistorique"=>3,"recu"=>3,"cartes"=>3,"addcarte"=>3,"modifcarte"=>3,"deletecarte"=>3,"cartelist"=>3,"addetd"=>3,"compte"=>2,"moncompte"=>2,'personnels'=>3,"updetd"=>3,'deletetd'=>3,"etdtlist"=>3,'updatecarte'=>3,'listpersonnels'=>3,'modifpersonnel'=>3,'deletepersonnel'=>3,'addetud'=>3,'modifetud'=>3,'suppetud'=>3,'userlist'=>3,'addjeton'=>3,'achat'=>1,'listopertion'=>1,'modifinfo'=>1,'modiflogin'=>1);



if (!array_key_exists($_GET['action'],$actions)||!isset($_SESSION['user']['role'])&&$actions[$_GET['action']]>0||isset($_SESSION['user']['role'])&&$actions[$_GET['action']]>$_SESSION['user']['role'])
{
    $tpl="errAction.twig";
    $param=array();
}
else
    include('actions/'.$_GET['action'].".php");

//prepared Statements

$upPers = $c->prepare("
	UPDATE personnel
	SET Nom = ?, Prenom = ?, CIN = ?, Description = ?
	WHERE id = ?
");

$addMember = $c->prepare("
    INSERT into personnel(id,nom,prenom,cin,description)
    VALUES (?,?,?,?,?)
");

if(isset($_POST["add"])){
    echo "Hello";
}

// si tout va bien, on ouvre la session
if(isset($_SESSION['user']))$param['user']=$_SESSION['user'];
echo $twig->render($tpl,$param); 







?>
