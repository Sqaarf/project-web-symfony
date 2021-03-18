<?php
	$admin = false;
	if(isset($_SESSION) && !empty($_SESSION) && $_SESSION["prenom"] == "admin"){
	  $admin = true;
}
?>


<footer>
	<p>Projet Architecture et développement web - Année 2020/2021 - SABBAH Zyad L2 </p>
	<?php if($admin == true):?>
		<a class="admin" href="./admin.php"> > OUTILS D'ADMINISTRATIONS</a>
	<?php endif; ?>

</footer>