<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom'];     
          $typeUtilisateur = $lgUser['typeUtilisateur'];       
          echo "<h2>" . $nom . " " . $prenom . "</h2>";   
       }
    ?>  
      </div>  
<?php      
  if (estVisiteurConnecte() ) {
     switch ($typeUtilisateur) {
        case 'V':
            echo "<h3>Visiteur médical</h3>"
            ?>
            <ul id="menuList">
               <li class="smenu">
                  <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
               </li>
               <li class="smenu">
                  <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
               </li>
               <li class="smenu">
                  <a href="cSaisieFicheFrais.php" title="Saisie fiche de frais du mois courant">Saisie fiche de frais</a>
               </li>
               <li class="smenu">
                  <a href="cConsultFichesFrais.php" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
               </li>
               </ul>
            <?php
           break;
        case 'C':
            echo "<h3>Comptable</h3>"
            ?>
            <ul id="menuList">
               <li class="smenu">
                  <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
               </li>
               <li class="smenu">
                  <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
               </li>
               <li class="smenu">
                  <a href="suiviPaiement.php" title="Suivie des paiments">Suivie des paiments</a>
               </li>
               <li class="smenu">
                  <a href="validationFrais.php" title="Validation des fiches de frais">Validation des fiches de frais</a>
               </li>
               </ul>
            <?php
            break;
     }
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
    