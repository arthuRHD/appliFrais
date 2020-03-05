<div class="card bg-dark">
    <div class="card-body">
        <div class="btn-group">
            <a class="btn btn-sm btn-success" href="index.php?uc=admin&action=changeState&mois=<?php echo $leMois; ?>&idvisit=<?php echo $idVisitMois; ?>&state=RB">Remboursée</a>
            <a class="btn btn-sm btn-primary" href="index.php?uc=admin&action=changeState&mois=<?php echo $leMois; ?>&idvisit=<?php echo $idVisitMois; ?>&state=VA">Validée et mise en paiement</a>
            <a class="btn btn-sm btn-danger" href="index.php?uc=admin&action=changeState&mois=<?php echo $leMois; ?>&idvisit=<?php echo $idVisitMois; ?>&state=CL">Saisie cloturée</a>
        </div>
        <a class="left btn btn-sm btn-warning" href="index.php?uc=modif&action=display&mois=<?php echo $leMois; ?>&idvisit=<?php echo $idVisitMois; ?>">Modifier</a>
    </div>
</div>