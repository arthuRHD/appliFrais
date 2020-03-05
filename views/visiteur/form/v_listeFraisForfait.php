<br>
<h2 class="display-4 text-center">Fiche de frais datant du <?php echo $numMois."-".$numAnnee ?></h2>
<?php
if ($_REQUEST['uc']=="modif") {
  echo '<h5 class="lead text-center">Nom du visiteur : <span class="text-monospace">'. $visiteur[0]["prenom"].' '.$visiteur[0]["nom"].'</span></h5>';
}
?>

<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card text-white bg-dark shadow">
      <div class="card-body">
        <h5 class="card-title text-monospace">Eléments forfaitisés</h5>
        <form method="POST"  action="<?php echo $urlFormF ?>">
        <p class="card-text">Veuillez remplir ces champs</p>
        <?php
				foreach ($lesFraisForfait as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
			?>
					<div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
						<span class="input-group-text" for="idFrais"><?php echo $libelle ?></span>
            </div>
            <input type="text" class="form-control" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" value="<?php echo $quantite?>" >
					</div>
			
			<?php
				}
			?>
        <div class="text-right">
          <div class="btn-group">
            <input class="btn btn-sm btn-success" id="ok" type="submit" value="Valider" size="20" />
            <input class="btn btn-sm btn-danger" id="annuler" type="reset" value="Effacer" size="20" />
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  
