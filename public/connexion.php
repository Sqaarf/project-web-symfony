<?php

function connexionBd($SERVEUR = 'localhost', $USER = 'root', $MDP = '', $BD = 'Pizzeria')
{
    try  {       
        $connexion= new PDO('mysql:host='.$SERVEUR.';dbname='.$BD, $USER, $MDP);
        $connexion->exec("SET CHARACTER SET utf8");	//Gestion des accents
        return $connexion;
    } 
    //gestion des erreurs
    catch(Exception $e) {        
        echo 'Erreur : '.$e->getMessage().'<br />';       
        echo 'N° : '.$e->getCode();
    }
}


?>