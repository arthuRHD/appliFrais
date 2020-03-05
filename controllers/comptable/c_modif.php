<?php
$idVisiteur = $_SESSION['idVisiteur'];
$pdo->sommaire($idVisiteur);
$action = $_REQUEST['action'];
switch ($action) {
    case 'display':
        $idVisitMois = $_REQUEST['idvisit'] ?? null;
        $leMois = $_REQUEST['mois'] ?? null; 
        $visiteur = $pdo->getNomVisiteur($idVisitMois); 
        $numAnnee =substr( $leMois,0,4);
        $numMois =substr( $leMois,4,2);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisitMois,$leMois);
        $lesFraisForfait= $pdo->getLesFraisForfait($idVisitMois,$leMois);
        $urlFormF = "index.php?uc=modif&action=update&idvisit=".$idVisitMois."&mois=".$leMois;
        $urlFormHF = "index.php?uc=modif&action=modifyHF&idvisit=".$idVisitMois."&mois=".$leMois;
        include("views/comptable/modification/v_navbar.php");
        include("views/visiteur/form/v_listeFraisForfait.php");
        include("views/comptable/modification/v_modifListHF.php");      
        break;  
    case 'modifyHF':
        $idVisitMois = $_REQUEST['idvisit'] ?? null;
        $leMois = $_REQUEST['mois'] ?? null; 
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisitMois,$leMois);
        include('controllers/comptable/c_modifHF.php');
        break;
}
