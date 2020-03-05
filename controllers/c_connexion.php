<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("views/connexion/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosUtilisateur($login,$mdp);
		if(!is_array($visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("views/base/v_erreurs.php");
			include("views/connexion/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
			$type = $pdo->getTypeUser($id)[0];
			switch ($type) {
				case 'V':
					include("views/base/v_sommaireV.php");
					break;
				case 'C':	
					include("views/base/v_sommaireC.php");
					break;
			}
			include("views/base/v_accueil.php");
		}
		break;
	}
	case 'deconnexion':{
		deconnecter();
		header('Location: index.php');
		break;
	}
	default :{
		include("views/connexion/v_connexion.php");
		break;
	}
}
?>