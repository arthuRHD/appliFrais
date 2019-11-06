<?php
include("include/fct.inc.php");

/* Modification des paramètres de connexion */

$serveur='mysql:host=172.20.10.2';
$bdd='dbname=bdGsb';   		
$user='userGsb' ;    		
$mdp='secret' ;	

/* fin paramètres*/

$pdo = new PDO($serveur.';'.$bdd, $user, $mdp);
$pdo->query("SET CHARACTER SET utf8"); 


set_time_limit(0);
creationFichesFrais($pdo);
creationFraisForfait($pdo);
creationFraisHorsForfait($pdo);
majFicheFrais($pdo);
?>