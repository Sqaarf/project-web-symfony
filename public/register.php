<?php

session_start();

include "./connexion.php";

$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');

if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["mdp1"]) && isset($_POST["mdp2"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["mdp1"]) && !empty($_POST["mdp2"])) {

	if($_POST["mdp1"] == $_POST["mdp2"]){
		$nb_rows = "SELECT COUNT(*) as nb FROM users";
		$count = $co -> query($nb_rows);
		$res = $count -> fetchAll(PDO::FETCH_OBJ);
		$article = json_decode(json_encode($res), true);

		$nb = $article[0]["nb"];

		$id = $nb + 1;
		$prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
		$email = $_POST["email"];
		$mdp = hash('sha256', $_POST["mdp1"]);

		$insert = "INSERT INTO users (id_user, prenom, nom, email, mdp) VALUES (".$id.", "."'".$prenom."'".", "."'".$nom."'".", "."'".$email."'".", "."'".$mdp."'".")";

		$in = $co -> exec($insert);

		if($in){
			$_SESSION["id"] = $id;
			$_SESSION["email"] = $email;
			$_SESSION["prenom"] = $prenom;
			$_SESSION["panier"] = array();
			header("Location: ./index.php");
		}
		else{
			echo "<script>alert(\"Erreur : Création du compte raté, veuillez vérifier vos informations\")</script>";
		}
		

	}

	else {
		echo "<script>alert(\"Erreur : Mot de passe incorrect\")</script>";
	}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./style.css">
	<title>Document</title>
</head>
<body>
	<?php require "./header.php"?>
	<div id="flex-container" style="position: absolute;top:20%;left: 37%;">
		<div class="form-container">
			<h2>Création de compte :</h2>
			<form action="./register.php" method="POST">
					<label for="prenom">Prenom : </label>
					<input type="text" name="prenom">
					<br>
					<label for="nom">Nom : </label>
					<input type="text" name="nom">
					<br>
					<label for="email">Email : </label>
					<input type="text" name="email">
					<br>
					<label for="mdp1">Mot de passe :</label>
					<input type="password" name="mdp1">
					<br>
					<label for="mdp2">Confirmer MDP :</label>
					<input type="password" name="mdp2">
					<input class="bouton" type="submit" value="Créer">
			</form>
		</div>
	</div>


	<?php require "./footer.php"?>
</body>
</html>