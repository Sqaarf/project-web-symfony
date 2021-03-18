<?php
include "./connexion.php";

$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');
session_start();
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
				<h2>Entrées</h2>
				<img src="./image/salad.jpg" alt="" width="200px" height="200px">
				<a href="./cat.php?id=1"> > Voir tout</a>
			</div>

			<div class="produit">
				<h2>Plats</h2>
				<img src="./image/pizza.jpg" alt="" width="200px" height="200px">
				<a href="./cat.php?id=2"> > Voir tout</a>
			</div>
		</div>

		<div id="flex-container">
			<div class="produit">
				<h2>Desserts</h2>
				<img src="./image/dessert.jpg" alt="" width="200px" height="200px">
				<a href="./cat.php?id=3"> > Voir tout</a>
			</div>
			<div class="produit">
				<h2>Boissons</h2>
				<img src="./image/boisson.jpg" alt="" width="200px" height="200px">
				<a href="./cat.php?id=4"> > Voir tout</a>
			</div>
		</div>
	</main>
	<?php require "./footer.php"?>
</body>
</html>