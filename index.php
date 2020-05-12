<?php

require_once("includes/fct.inc.php");
require_once("includes/class.pdogsb.inc.php");
include("views/base/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_GET['uc']) || !$estConnecte){
	$_REQUEST['uc'] = 'connexion';
}	
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':
		include("controllers/c_connexion.php");break;
	case 'manage' :
		include("controllers/visiteur/c_manage.php");break;
	case 'display' :
		include("controllers/visiteur/c_display.php");break; 
	case 'admin':
		include("controllers/comptable/c_admin.php");break;
	case 'modif':
		include("controllers/comptable/c_modif.php");break;
}
include("./views/base/v_pied.php") ;