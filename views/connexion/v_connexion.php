<div id="contenu" class="card text-white bg-dark shadow">
      <div class="card-header"><h1 class="card-title lead">Identification utilisateur</h1></div>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
   <div class="card-body input-group-sm">
    
			<p>
                  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Login</span>
  </div>
  <input id="login" type="text" name="login" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Mot de passe</span>
  </div>
  <input id="mdp"  type="password"  name="mdp" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
      </div>
      <div class="text-right">
      <div class="btn btn-group">
         <input class="btn btn-success" type="submit" value="Valider" name="valider">
         <input class="btn btn-danger" type="reset" value="Annuler" name="annuler"> 
      </div>
      </div>
</form>

</div>