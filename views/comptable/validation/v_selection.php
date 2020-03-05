<br>
<div class="card bg-dark shadow" style="width: 22rem;">
  <div class="card-body">
    <h5 class="card-title lead">Validation</h5>
    <form action="index.php?uc=admin&action=selectionVisiteur" method="POST">
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text">Visiteur</span>
        </div>
        <select class="custom-select" name="selectIdVisiteur" id="selectIdVisiteur">
            <option value="" disabled>Veuillez choisir un visiteur</option>
            <?php 
                foreach ($data as $v) {
                    if ($selectedVisiteur==$v["id"]) { $attr = "selected"; } else { $attr = ""; }
                    echo '<option value="'.$v['id'].'"'.$attr.'>'.$v['prenom'].' '.$v['nom'].'</option>';
                }
            ?>
        </select>
        <div class="input-group-append">
            <input class="btn btn-secondary" type="submit" value="Valider">
        </div>
    </div>
    </form>
    <br>
    <form action="index.php?uc=admin&action=afficherFrais" method="POST" id="form2" <?php if ($selectedVisiteur == '') {
        echo 'hidden';
    } ?>>
    <div id="formmois" class="input-group input-group-sm">
        <div class="input-group-prepend">
            <span class="input-group-text">Mois</span>
        </div>
        <select class="custom-select" name="mois" id="mois">
            <option value="" disabled>Veuillez choisir un mois pour ce visiteur</option>
            <?php
                foreach ($mois as $m) {
                    echo '<option value="'.$m['mois'].'">'.$m['mois'].'</option>';
                }
            ?>            
        </select>
        <input type="hidden" name="idvisit" value="<?php echo $selectedVisiteur ?>">
        <div class="input-group-append">
            <input id="submit2" class="btn btn-primary" type="submit" value="C'est parti !">
        </div>
    </div>
    </form>
  </div>
</div>