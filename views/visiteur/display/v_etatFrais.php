
    
    <div class="jumbotron text-dark shadow">
    <h3 class="text-center display-3">Fiche de frais du mois <?php echo $numMois."-".$numAnnee?></h3>
    <h4 class="text-center display-4"><?php echo($visiteur[0]['prenom']);echo ' '; echo($visiteur[0]['nom']); ?></h4>
    <p <?php 
    switch ($libEtat) {
      case 'Validée et mise en paiement':echo 'class="alert alert-primary"';break;  
      case 'Remboursée': echo 'class="alert alert-success"';break;
      case 'Saisie clôturée': echo 'class="alert alert-danger"'; break;
      case 'Fiche créée, saisie en cours': echo 'class="alert alert-warning"';break;
    }
    ?>>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
    <table class="table">
    
    <h4>Quantités des éléments forfaitisés</h4>
  <thead class="thead">
    <tr class="table-primary">
    
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th scope="col"> <?php echo $libelle?></th>
		 <?php
        }
		?>
		
    </tr>
  </thead>
  <tbody><tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		?>
		</tr>

  </tbody>
        
        
    </table>
    <h4>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -</h4>
  	<table class="table table-sm">
    <thead>
            <tr class="table-primary">
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
             </tr>
    </thead>
    <tbody>
    <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
		?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
             </tr>
        <?php 
          }
		?>
    </tbody>
             
        
    </table>
    </div>
  </div>
  </div>
 













