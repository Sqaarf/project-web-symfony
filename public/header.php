<?php
$login = false;
if(isset($_SESSION) && !empty($_SESSION)){
  $login = true;
}

?>


<header id="header-background">

  <div class="navigation-bar">
    <div id="navigation-container">
      <img src="./image/logo-pizza.png">

      <ul>
        <li><a href="./index.php">Accueil</a></li>
        <li><a href="./panier.php">Panier</a></li>
        <li><a href="./login.php">Connexion</a></li>
        <?php if($login == true):?>
          <li><span>Bonjour <?=$_SESSION["prenom"]?></span></li>
          <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php endif;?>
      </ul>
    </div>
</header>
