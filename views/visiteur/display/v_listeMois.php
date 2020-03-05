 <div class="card text-white bg-dark shadow">
 <div class="card-header">
      <h2 class="display-4">Mes fiches de frais</h2>
      </div>
      <div class="card-body">
      <p class="card-text">Mois à sélectionner : </p>
      <form action="index.php?uc=display&action=voirEtatFrais" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <select class="form-control" id="lstMois" name="lstMois">
          <option value=""  disabled>Veuillez choisir un mois</option>
            <?php
			foreach ($lesMois as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      </p>
      </div>
      <div class="text-right">
      <p class="btn-group">
        <input class="btn btn-success" id="ok" type="submit" value="Valider" size="20" />
        <input class="btn btn-danger" id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
      </div>