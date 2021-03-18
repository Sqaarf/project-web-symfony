<?php

include "./connexion.php";

session_start();

$co = connexionBd('localhost', 'debian-sys-maint', 'wjDe1GrnsS2MnZY3', 'Pizzeria');

if( isset($_GET["id"]) && !empty($_GET["id"])){
	$id = $_GET["id"];

	$sql = "SELECT * FROM menu WHERE id_cat = ".$id;
	$count = $co -> query($sql);
	$res = $count -> fetchAll(PDO::FETCH_OBJ);
	$article = json_decode(json_encode($res), true);

	//var_dump($article);
}
else {
	header("Location: http://localhost:8080/index.php");
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
			<?php for ($i=0; $i < count($article); $i++): ?>
				<div class="produit">
					<h2><?=$article[$i]["nom"]?></h2>
					<img src="<?=$article[$i]["img_path"]?>" alt="" width="200px" height="200px">
					<p><?=$article[$i]["description"]?></p>
					<p><?=$article[$i]["prix"]?> €</p>
					<a href="./panier.php?id=<?=$article[$i]["id_plat"]?>"> > Commander</a>
				</div>
			<?php endfor ?>
		</div>
	</main>
	<?php require "./footer.php"?>
</body>
</html>