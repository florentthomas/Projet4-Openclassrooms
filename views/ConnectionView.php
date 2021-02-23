
<form id="page_connection_admin" action="<?=URL?>admin/connection" method="post" class="m-5">
  <div class="form-group">
    <label for="email">Adresse Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<div class="m-5"><a href="<?=URL?>">Revenir au blog</a></div>

<?php
if(isset($error_connection)){
?>
<p id="error_connection">Mot de passe ou email invalide</p>
<?php
}
?>

