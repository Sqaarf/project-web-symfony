<?php
	
	session_start();
	
	include "./connexion.php";

	$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');


	if (isset($_POST["email"]) && isset($_POST["mdp"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) ) {
		//DEBUG ADMIN
		if($_POST["email"] == "admin" && $_POST["mdp"] == "admin"){ 
			
			$_SESSION["email"] = $_POST["email"];
			$_SESSION["prenom"] = "admin";
			
			header("Location: ./index.php");
		}
		else{
			$sql = "SELECT id_user, email, mdp FROM users";
			$count = $co -> query($sql);
			$res = $count -> fetchAll(PDO::FETCH_OBJ);
			$article = json_decode(json_encode($res), true);
			$id;

			for($i = 0; $i < count($article); $i++){
				if ($article[$i]["email"] == $_POST["email"] && $article[$i]["mdp"] == hash('sha256', $_POST["mdp"])) {
					$id = $article[$i]["id_user"];
				}
			}

			if(!empty($id)){
				$sql = "SELECT id_user, prenom, email FROM users WHERE id_user = ".$id;
				$count = $co -> query($sql);
				$res = $count -> fetchAll(PDO::FETCH_OBJ);
				$article = json_decode(json_encode($res), true);


				$_SESSION["id"] = $article[0]["id_user"];
				$_SESSION["email"] = $article[0]["email"];
				$_SESSION["prenom"] = $article[0]["prenom"];
				$_SESSION["panier"] = array();

				header("Location: ./index.php");
			}
			else{
				echo "<script>alert(\"Erreur : Ce compte n'existe pas\")</script>";
			}
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
	<div id="flex-container" style="position: absolute;top:30%;left: 37%;">
		<div class="form-container">
			<h2>Connectez vous à votre compte :</h2>
			<p style="color:red;">Admin : email = admin, mdp = admin</p>
			<form action="./login.php" method="POST">
					<label for="email">Email : </label>
					<input type="text" name="email">
					<br>
					<label f
					or="mdp">Mot de passe :</label>
					<input type="password" name="mdp">
					<input class="bouton" type="submit" value="Confirmer">
					<br>
					<a href="./register.php">Vous n'avez pas de compte ? Cliquez ici !</a>
			</form>
		</div>
	</div>


	<?php require "./footer.php"?>
</body>
</html>