<?php

include "./connexion.php";

session_start();

$datetime = date_create()->format('Y-m-d H:i:s'); //Calcul de la date pour l'insertion

$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');

//Si le bouton effacer panier et appuyé alors le panier se vide
if(isset($_POST["clear"]) && !empty($_POST["clear"])){
	$_SESSION["panier"] =  array();
}

//Si une commande est passée la table commandes est actualisée avec de nouvelles données
if(isset($_POST["command"]) && !empty($_POST["command"])){
	for ($i=0; $i < count($_SESSION["panier"]) ; $i++) { 
		$insert = "INSERT INTO commandes (id_plat, nom_article, id_client, nom_client, date, prix) VALUES (".$_SESSION["panier"][$i][0]["id_plat"].", "."'".$_SESSION["panier"][$i][0]["nom"]."'".", ".$_SESSION["id"].", "."'".$_SESSION["prenom"]."'".", "."'".$datetime."'".", ".$_SESSION["panier"][$i][0]["prix"].")"; //insertion SQL

		$in = $co -> exec($insert);

		if(!$in){ //Vérification si l'insertion a eu une erreur
			echo "<script>alert(\"Erreur : $co->errorInfo()\")</script>";
			print_r($co->errorInfo()); //affichage de l'erreur
		}
	}
	$_SESSION["panier"] =  array(); //Vidage du panier
}

if(isset($_SESSION) && !empty($_SESSION)){ //Vérification si une session existe bien
	if( isset($_GET["id"]) && !empty($_GET["id"])){ //Vérification si un id est passer en URL
		$total = 0;
		$id = $_GET["id"];

		$sql = "SELECT * FROM menu WHERE id_plat = ".$id; //Cherche dans la table menu le plat correspondant au plat
		$count = $co -> query($sql);
		$res = $count -> fetchAll(PDO::FETCH_OBJ);
		$article = json_decode(json_encode($res), true);

		
		$_SESSION["panier"][] = $article; //Ajout du plat dans la variable _SESSION panier


		
	}
}
else{
	echo "<script>alert(\"Erreur : Vous n'êtes pas connecter\")</script>";
	header("Location: ./login.php"); //Redirection vers la page de connexion
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style.css">
	<link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<script>0</script>
	<?php require "./header.php"?>
	<main>
		<div id="flex-container">
			<div class="produit">
				<h2>Panier :</h2>
				<?php if(count($_SESSION["panier"]) != 0): ?>
					<ul>
						<?php for($i = 0; $i < count($_SESSION["panier"]); $i++):?>
							<li><?=$_SESSION["panier"][$i][0]["nom"]?> | <?=$_SESSION["panier"][$i][0]["prix"]?> €</li>
							<?php $total += $_SESSION["panier"][$i][0]["prix"]?>
						<?php endfor;?>
					</ul>
					<br>
					<h2>Total : <?=$total?> €</h2>
					<br>
					<form action="./panier.php" method="POST">
						<input name="clear" type="hidden" value="1">
						<input type="submit" value="Effacer panier">
					</form>
					<br>
					<form action="./panier.php" method="POST">
						<input name="command" type="hidden" value="1">
						<input type="submit" value="Commander">
					</form>
				<?php else: ?>
					<p>Votre panier est vide :(</p>
				<?php endif ?>

			</div>
		</div>
	</main>
	<?php require "./footer.php"?>
</body>
</html>