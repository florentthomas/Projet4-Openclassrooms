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
      <textarea name="create_chapter" cols="30" rows="10"></textarea>
      <label for="author">Auteur: </label><input type="text" id="author" name="author" required>
      <input type="submit" value="Valider">
  </form>


</section>

<section id="mofifier_chapitre">


</section>

<section id="commentaires_signales">
  <h3>Vous avez <?=isset($comments_signal) ? count($comments_signal) : '0'?> commentaire(s) signalé(s)</h3>
<?php
if(isset($comments_signal)){
  foreach($comments_signal as $comment_signal){
?>
  <span>Commentaire signalé <?=htmlspecialchars($comment_signal->get_signal_comment())?> fois</span>
  <div class="card">
  <div class="card-header">
    <?=htmlspecialchars($comment_signal->get_first_name())?>
    <?=htmlspecialchars($comment_signal->get_last_name())?>
    <?=htmlspecialchars($comment_signal->get_date_comment()->format('d/m/Y à h:i'))?>
  </div>
  <div class="card-body">
    <p class="card-text"><?=htmlspecialchars($comment_signal->get_comment())?></p>
    <a href="#" class="btn btn-primary">Approuver le commentaire</a>
    <a href="#" class="btn btn-danger">Supprimer le commentaire</a>
  </div>
</div>
<?php
  }
}
?>
</section>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("create_chapter")</script>    

<?php
}
?>