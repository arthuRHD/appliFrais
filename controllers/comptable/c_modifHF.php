<?php
$listDeny = array();
$listAccept = array();
$listReport = array();
$lesIdHorsForfait = $pdo->getLesIdFraisHF();

for ($i=0; $i < count($lesIdHorsForfait); $i++) {
    $index = "radio_".$i;
    if(isset($_REQUEST[$index])) {
        switch ($_REQUEST[$index][0]) {
            case 'refus':
                array_push($listDeny, $i);
                break;
            case 'accept':
                array_push($listAccept, $i);
                break;
            case 'report':
                array_push($listReport, $i);
                break;
        }
    }
}
if (!empty($listDeny)) {
    foreach ($listDeny as $idHorsFrais) {
        $pdo->majFraisHorsForfait($idHorsFrais, "refus");
    }
}
if (!empty($listAccept)) {
    foreach ($listAccept as $idHorsFrais) {
        $pdo->majFraisHorsForfait($idHorsFrais, "accept");
    }
}
if (!empty($listReport)) {
    foreach ($listReport as $idHorsFrais) {
        $pdo->majFraisHorsForfait($idHorsFrais, "report");
    }
}
header('Location: index.php?uc=modif&action=display&mois='.$leMois.'&idvisit='.$idVisitMois);