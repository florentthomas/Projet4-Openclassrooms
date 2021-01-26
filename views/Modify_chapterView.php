<?php

if(isset($_SESSION['user'])){
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?=$_SESSION['user']['first_name']?> <?=$_SESSION['user']['last_name']?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Créer un nouveau chapitre</a>
      <a class="nav-item nav-link" href="#">Modifier un chapitre</a>
      <a class="nav-item nav-link" href="#">commentaires signalés</a>
    </div>
  </div>
  <a href="<?=URL?>admin/disconnect">Se déconnecter</a>
</nav>


<section id="ecrire_un_chapitre">
  <form>
      <label for="title">Titre: </label><input type="text" id="title" name="title" required>
      <textarea name="create_chapter" cols="30" rows="10"><?=$chapter->get_content()?></textarea>
      <label for="author">Auteur: </label><input type="text" id="author" name="author" required>
      <input type="submit" value="Valider"/>
  </form>
</section>
<?php
}
?>