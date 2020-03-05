<?php
$idVisiteur = $_SESSION['idVisiteur'];
$pdo->sommaire($idVisiteur);
$action = $_REQUEST['action'];
switch ($action) {
    case 'selectionVisiteur':        
        $data = $pdo->getAllVisiteur();
        $idVisitMois = $_REQUEST['selectIdVisiteur'] ?? null;
        if (isset($idVisitMois)) {            
            $mois = $pdo->getLesMoisDisponibles($idVisitMois);
            $selectedVisiteur = $_REQUEST['selectIdVisiteur'];
        } 
        else {
            $selectedVisiteur = '';
        }
        include("views/comptable/validation/v_selection.php");         
        break;
    case 'afficherFrais':
        $idVisitMois = $_REQUEST['idvisit'];
        $leMois = $_REQUEST['mois'];
        
        if (isset($idVisitMois)&&isset($leMois)) {
            include("views/comptable/validation/v_navbar.php");
            $visiteur = $pdo->getNomVisiteur($idVisitMois);             
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisitMois,$leMois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisitMois,$leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisitMois,$leMois);
            $numAnnee =substr( $leMois,0,4);
            $numMois =substr( $leMois,4,2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModif =  dateAnglaisVersFrancais($dateModif);
            include("views/visiteur/display/v_etatFrais.php");
        }
        break;
    case 'changeState': 
        $idVisitMois = $_REQUEST['idvisit'] ?? null;
        $leMois = $_REQUEST['mois'] ?? null; 
        $state = $_REQUEST['state'];
        if (in_array($state,["VA", "CL", "RB"])) {
            $pdo->majEtatFicheFrais($idVisitMois,$leMois, $state);
        }        
        header('Location: index.php?uc=admin&action=afficherFrais&mois='.$leMois.'&idvisit='.$idVisitMois);
        break;
}