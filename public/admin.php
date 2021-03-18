<?php

session_start();

include "./connexion.php";

$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');

$iter_options = 1;

$nb_rows = "SELECT COUNT(*) as nb FROM menu";
$count = $co -> query($nb_rows);
$res = $count -> fetchAll(PDO::FETCH_OBJ);
$article = json_decode(json_encode($res), true);

$nb = $article[0]["nb"];


if($_SESSION["prenom"] != "admin" && $_SESSION["mdp"] != "admin"){
	header("Location: ./index.php");
}

if (isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["id_cat"]) && isset($_POST["prix"]) && isset($_FILES["img_path"])){
	
	if(!empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["id_cat"]) && !empty($_POST["prix"]) && !empty($_FILES["img_path"])){
		
		$nom = $_POST["nom"];
		$description = $_POST["description"];
		$id_cat = $_POST["id_cat"];
		$prix = $_POST["prix"];
		$img_path = "./image/".basename($_FILES["img_path"]["name"]);
		$id = $nb + 1;

		move_uploaded_file($_FILES["img_path"]["tmp_name"], $img_path);
		

		$insert = "INSERT INTO menu (id_plat, nom, description, prix, id_cat, img_path) VALUES (".$id.", "."'".$nom."'".", "."'".$description."'".", ".$prix.", ".$id_cat.", "."'".$img_path."'".")";

		$in = $co -> exec($insert);

		if($in){
			$msg = "Insertion réussis !";
		}
		else{
			$msg = "Insertion raté !";

		}

	} else {
		echo "<script>alert(\"Erreur : Veuillez remplir tout les champs\")</script>";
	}
}

if (isset($_POST["id_plat"]) && !empty($_POST["id_plat"])) {
	$id_plat = $_POST["id_plat"];

	$remove = "DELETE FROM menu WHERE id_plat = ".$id_plat;
	$del = $co -> exec($remove);

	if($del){
		$msg2 = "Délétion réussis !";
	}
	else{
		$msg2 = "Délétion raté !";

	}
		

}


/** Affiche les options de select dans insertion de données **/
$cat_sql = "SELECT nom FROM categorie";
$count = $co -> query($cat_sql);
$res = $count -> fetchAll(PDO::FETCH_OBJ);
$article = json_decode(json_encode($res), true);

/** Affiche les options de select dans insertion de données **/
$plat_sql = "SELECT nom FROM menu";
$count = $co -> query($plat_sql);
$res = $count -> fetchAll(PDO::FETCH_OBJ);
$plats = json_decode(json_encode($res), true);

//$_POST = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<?php require "./header.php"?>

	<div id="flex-container">
		<div class="form-container">
			<h2>Insérer des données :</h2>
			<form action="./admin.php" method="POST" enctype="multipart/form-data" >
					<label for='nom'>Nom du plat :</label>
					<input type="text" name="nom">
					<br>

					<label for='description'>Description :</label>
					<input type="text" name="description">
					<br>

					<label for='prix'>Prix :</label>
					<input type="text" name="prix">
					<br>

					<label for='id_cat'>Categorie :</label>
					<select name="id_cat">
						<?php foreach ($article as $val):?>
							<option value=<?=$iter_options?>><?=$val["nom"]?></option>
							<?php $iter_options++?>
						<?php endforeach; ?>
					</select>
					<br>

					<label for='img_path'>Image :</label>
					<input type="file" name="img_path" accept="image/png, image/jpeg">
					<input type="submit" name="envoyer" value="Envoyer">
			</form>
			<p><?=$msg?></p>
		</div>

		<div class="form-container">
			<h2>Effacer des données :</h2>
			<form action="./admin.php" method="POST">
				<label for="id_plat">Plats :</label>
				<select name="id_plat">
					<?php for($i = 0; $i < count($plats); $i++):?>
						<option value=<?=$i+1?>><?=$plats[$i]["nom"]?></option>
					<?php endfor; ?>
				</select>

				<input type="submit" value="Effacer">
			</form>
			<p><?=$msg2?></p>
		</div>
	</div>

	<?php require "./footer.php"?>
</body>
</html>