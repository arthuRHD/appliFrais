<div class="col-sm-6">
    <div class="card text-white bg-dark shadow">
      <div class="card-body">
        <h5 class="card-title text-monospace">Nouvel élément hors forfait</h5>
        <p class="card-text">Veuillez remplir ces champs</p>
        <form action="index.php?uc=manage&action=validerCreationFrais" method="post">
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
              <span class="input-group-text" for="txtDateHF">Date (jj/mm/aaaa): </span>
          </div>
          <input class="form-control" type="text" id="txtDateHF" name="dateFrais" value=""  />
        </div>
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
              <span class="input-group-text" for="txtLibelleHF">Libellé</span>
          </div>
          <input class="form-control" type="text" id="txtLibelleHF" name="libelle"  value="" />
        </div>
        <div class="input-group input-group-sm mb-2">
          <div class="input-group-prepend">
              <span class="input-group-text" for="txtMontantHF">Montant : </span>
          </div>
          <input class="form-control" type="text" id="txtMontantHF" name="montant" value="" />
        </div>
        <div class="text-right">
          <div class="btn-group">
            <input class="btn btn-sm btn-success" id="ajouter" type="submit" value="Ajouter" size="20" />
            <input class="btn btn-sm btn-danger" id="effacer" type="reset" value="Effacer" size="20" />
          </div>
        </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
<br>
<div class="jumbotron text-white bg-dark shadow">
<form action="<?php echo $urlFormHF;?>" method="post">
<table class="table">
        <h4 class="text-monospace">Descriptif des éléments hors forfait</h4>
          <thead>
            <tr class="bg-info text-light">
                <th class="date">Date</th>
				<th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>  
                <th class="refus">Refuser le frais</th>  
                <th class="accept">Restaurer le frais</th>     
                <th class="report">Reporter à la semaine prochaine</th>       
             </tr>
          </thead>
          <tbody>
          <?php    
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date = $unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
	?>		
            <tr class="table-secondary">
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><input type="radio" name="radio<?php echo '_'.$id; ?>[]" value="refus"></td>
                <td><input type="radio" name="radio<?php echo '_'.$id; ?>[]" value="accept"></td>
                <td><input type="radio" name="radio<?php echo '_'.$id; ?>[]" value="report"></td>
             </tr>
	<?php		 
          }
	?>	  
          </tbody>
        </table>
        <input type="hidden" name="idvisit" value="<?php echo $idVisitMois;?>">
        <input type="hidden" name="mois" value="<?php echo $leMois;?>">
        <div class="btn-group">
          <input class="btn btn-success" type="submit" value="Actualiser">
          <input class="btn btn-danger" type="reset" value="Annuler">
        </div>
    <form>     
</div>