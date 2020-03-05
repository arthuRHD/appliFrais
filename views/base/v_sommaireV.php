<nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark rounded shadow">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<a class="nav-brand badge badge-pill badge-success" href="#">
				  <div class="text-dark">VISITEUR</div>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
</a>
<div class="collapse navbar-collapse">
<ul id="menuList" role="tablist" class="navbar-nav mr-auto">        		
           <li class="nav-item">
              <a role="tab" class="nav-link" href="index.php?uc=manage&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="nav-item">
              <a role="tab" class="nav-link" href="index.php?uc=display&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li> 
 	      <li class="nav-item">
              <a role="tab"class="nav-link" href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
</div>        
</nav>    