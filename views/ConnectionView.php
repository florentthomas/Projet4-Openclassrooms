<?php
?>

<form id="page_connection_admin" action="<?=URL?>admin/connection" method="post">
  <div class="form-group">
    <label for="email">Adresse Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>