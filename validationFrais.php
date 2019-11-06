<?php
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si visiteur non connecté
  if ( ! estVisiteurConnecte() ) {
      header("Location: cSeConnecter.php");  
  }
  require($repInclude . "_entete.inc.html");
  require($repInclude . "_sommaire.inc.php");
  
  // acquisition des données entrées, ici le numéro de mois et l'étape du traitement
  $moisSaisi=lireDonneePost("lstMois", "");
  $etape=lireDonneePost("etape",""); 

  if ($etape != "demanderConsult" && $etape != "validerConsult") {
      // si autre valeur, on considère que c'est le début du traitement
      $etape = "demanderConsult";        
  } 
  if ($etape == "validerConsult") { // l'utilisateur valide ses nouvelles données
                
      // vérification de l'existence de la fiche de frais pour le mois demandé
      $existeFicheFrais = existeFicheFrais($idConnexion, $moisSaisi, obtenirIdUserConnecte());
      // si elle n'existe pas, on la crée avec les élets frais forfaitisés à 0
      if ( !$existeFicheFrais ) {
          ajouterErreur($tabErreurs, "Le mois demandé est invalide");
      }
      else {
          // récupération des données sur la fiche de frais demandée
	      $tabFicheFrais = obtenirDetailFicheFrais($idConnexion, $moisSaisi, obtenirIdUserConnecte());

      }
  } 
 
?>
<div id="contenu">
  <h2>Validation des fiches de frais</h2>
  <form action="#" method="post">
    <h3>Selectionnez le mois : </h3>
    <select name="monthSelect" id="month">
        <?php 
            // on propose tous les mois pour lesquels le visiteur a une fiche de frais
  		$req = obtenirTousLesMois();
        $idJeuMois = mysqli_query($idConnexion, $req);
        $lgMois = mysqli_fetch_assoc($idJeuMois);
  
        while ( is_array($lgMois) ) {
              $mois = $lgMois["mois"];
              $noMois = intval(substr($mois, 4, 2));
              $annee = intval(substr($mois, 0, 4));
            ?>    
             <option value="<?php echo $mois; ?>"<?php if ($moisSaisi == $mois) { ?> selected="selected"<?php } ?>><?php echo obtenirLibelleMois($noMois) . " " . $annee; ?></option>
            <?php
              $lgMois = mysqli_fetch_assoc($idJeuMois);        
        }
        mysqli_free_result($idJeuMois);
        ?>
    </select>    
    <h3>Selectionnez un visiteur : </h3>
    <select name="visiteurSelect" id="visiteur">
        <?php
        // on propose tous les visiteurs pour lesquels ces visiteurs ont des fiche de frais
        $req = obtenirTousLesVisiteurs();
        $idJeuUsers = mysqli_query($idConnexion, $req);
        $lgUsers = mysqli_fetch_assoc($idJeuUsers);

        while ( is_array($lgUsers) ) {
            $user = $lgUsers["nom"] . " " . $lgUsers["prenom"];
            ?>    
            <option value="<?php echo $user; ?>"><?php echo $user; ?></option>
            <?php
            $lgUsers = mysqli_fetch_assoc($idJeuUsers);        
        }
        mysqli_free_result($idJeuUsers);
        ?>
    </select>
    <br>
    <input type="submit" value="Valider">
  </form>  
</div>
<?php        
  require($repInclude . "_pied.inc.html");
  require($repInclude . "_fin.inc.php");
?> 