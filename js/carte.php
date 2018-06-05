<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 16/09/2016
 * Time: 21:43
 */

$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=cartenum','root','');
if(!$c)
    die("erreur connexion");

if(isset($_GET['key'])) {
    $key = $_GET['key'];
    $sql = "SELECT * FROM carte WHERE refCarte REGEXP '^$key'";

    $req = $c->query($sql);
    $count = $req->rowCount($sql);

while($row = $req->fetch(PDO::FETCH_OBJ)) {
    $stm = $c->query("Select * from etudiant where refEtud='" . $row->refEtu . "' ");
    while($q = $stm->fetch(PDO::FETCH_OBJ)){
    ?>
    <form method="post" action="commande.php">
        <input hidden type="text" value="<?php echo $q->id;?>" name="refEtud">
    <label class="moderns">Nom et Prenom:</label><label class="simple-input"><?php echo $q->Nom . ' ' . $q->Prenom;} ?></label><br>



        <input hidden name="ref" value="<?php echo $row->refCarte; ?>">
        <input hidden name="solde" value="<?php echo $row->SoldeCarte; ?>">
        <label class="moderns">Reference de la carte:</label><label class="simple-input"><?php echo $row->refCarte; ?></label><br>
        <label class="moderns">Solde:</label><label class="simple-input"><?php echo $row->SoldeCarte.' DH'; ?></label><br>
        <label class="moderns">Statut:</label><label class="simple-input"><?php if ($row->statut == 0) echo 'Desactiv&eacute;e'; elseif ($row->statut == 1) echo 'Activ&eacute;e'; ?></label><br>
        <input type="text" hidden value="<?php echo $row->statut; ?>" name="statut">
        <label class="moderns">Entrer le Prix ici:</label><input type="number" step="0.01" required name="prix" class="simple-input">
        <input type="submit" value="valider" name="valider" class="simple-input">
     <?php

}    }else{
    echo "Aucun resultat pour :".$key ;

}


/*    if(isset($_GET['ref'])) {
        // requête qui récupère les régions
        $requete = "SELECT * FROM carte where REGEXP '^$key'";
    }

    // connexion à la base de données
     // exécution de la requête
    $resultat = $c->query($requete) or die(print_r($bdd->errorInfo()));

    // résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // je remplis un tableau et mettant l'id en index (que ce soit pour les régions ou les départements)
        $json[]=array_map('utf8_encode',$donnees);
    }

    // envoi du résultat au success
    echo json_encode($json);
 */

?>

