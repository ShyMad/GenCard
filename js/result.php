<?php
$c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=cartenum','root','');
		if(!$c)
		die("erreur connexion");
function safe($var)
{
	$var = mysql_real_escape_string($var);
	$var = addcslashes($var, '%_');
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_GET['key']) && isset($_GET['path'])) {
	$path = $_GET['path'];
	$key = $_GET['key'];
	if ($path == "etd") {
		$sql = "SELECT * FROM etudiant WHERE refEtud REGEXP '^$key' OR Nom REGEXP '^$key' OR Prenom REGEXP '^$key' OR Filiere REGEXP '^$key' ";
		$req = $c->query($sql);
		$count = $req->rowCount($sql);

		while ($row = $req->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>;
			<td><?php echo $row->refEtud ?></td>
			';
			<td><?php echo $row->Nom ?></td>
			';
			<td><?php echo $row->Prenom ?></td>
			';
			<td><?php echo $row->Etablissement ?></td>
			';
			<td><?php echo $row->Filiere ?></td>
			';
			<td><a href="modifetud.html?modifetud&id=<?php echo $row->id ?>"><img style="margin-left:25px;padding:5px"
																				  src="Css/images/update.png"
																				  height="30" width="30"></a>&emsp;
				<a href="suppetud.html?suppetud&id=<?php echo $row->id ?>"><img style="margin-left:25px;padding:5px"
																				src="Css/images/delete.png" height="30"
																				width="30"></a>
			</td>
			</tr><?php

		}

	}
	elseif ($path == "carte") {
		$sql = "SELECT * FROM carte WHERE refCarte REGEXP '^$key' OR refEtu REGEXP '^$key'";
		$req = $c->query($sql);
		$c->errorInfo();
		//$count = $req->rowCount($sql1);

		while ($row1 = $req->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>
			<td><?php echo $row1->refCarte ?></td>

			<td><?php echo $row1->refEtu ?></td>

			<?php $etd = $c->query("select * from etudiant where refEtud='" . $row1->refEtu . "'");

			while ($etud = $etd->fetch(PDO::FETCH_ASSOC)) { ?>

				<td><?php echo $etud['Nom']; ?></td>
				<td><?php echo $etud['Prenom'];}?></td>

				<td><?php echo $row1->SoldeCarte.' DH'; ?></td>

				<td><?php if($row1->statut == 1) echo "A"; else echo "D"; ?></td>

				<td><a href="modifcarte.html?modifcarte&id=<?php echo $row1->id ?>"><img
							style="margin-left:25px;padding:5px"
							src="Css/images/update.png"
							height="30" width="30"></a>&emsp;
					<a href="deletecarte.html?deletecarte&id=<?php echo $row1->id ?>"><img style="margin-left:25px;padding:5px"
																					src="Css/images/delete.png"
																					height="30"
																					width="30"></a>
				</td>
				</tr><?php

			}

		}
		if ($path == "pers") {
			$sql = "SELECT * FROM personnel WHERE Nom REGEXP '^$key' OR Prenom REGEXP '^$key' OR CIN REGEXP '^$key' ";
			$req = $c->query($sql);
			//$count = $req->rowCount($sql);

			while ($row = $req->fetch(PDO::FETCH_OBJ)) {
				$n = $c->query("select role from login WHERE refPersonnel='". $row->id ."'");
				$st = $n->fetch(PDO::FETCH_ASSOC);
				if($st['role'] ==3 )$statut = 'Super Admin';
				elseif($st['role'] == 2) $statut = 'Member';

				?>

				<tr>;
				<td><?php echo $row->Nom ?></td>
				';
				<td><?php echo $row->Prenom ?></td>
				';
				<td><?php echo $row->CIN ?></td>
				';
				<td><?php echo $statut; ?></td>
				';
				<td><?php echo $row->description ?></td>
				';
				<td><a href="modifpersonnel.html?modifpersonnel&id=<?php echo $row->id ?>"><img style="margin-left:25px;padding:5px"
																					  src="Css/images/update.png"
																					  height="30" width="30"></a>&emsp;
					<a href="deletepersonnel.html?deletepersonnel&id=<?php echo $row->id ?>"><img style="margin-left:25px;padding:5px"
																					src="Css/images/delete.png" height="30"
																					width="30"></a>
				</td>
				</tr><?php

			}
		}
		if ($path == "hist") {

		}
	}

?>