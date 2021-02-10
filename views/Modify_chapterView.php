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


<section id="modifier_un_chapitre">
  <form method="post" action="<?=URL?>admin/apply_modification">
    <div class="form-group">
      <label for="title">Titre</label>
      <input type="text" class="form-control" id="title" name="title" value="<?=$chapter->get_title()?>" required/>
    </div>
    <input type="hidden" name="id" value="<?=$chapter->get_id()?>"/>    
    <textarea name="content" cols="30" rows="10"><?=$chapter->get_content()?></textarea>
    <div class="form-group">
      <label for="author">Auteur</label>
      <input type="text" class="form-control" id="author" name="author" value="<?=$chapter->get_author()?>" required/>
    </div>
    <button type="submit" class="btn btn-primary">Modifier le chapitre</button>
  </form>
</section>

<div class="text-center">
<button type="button" class="btn btn-danger center-block" data-toggle="modal" data-target="#exampleModal">
  Supprimer ce chapitre
</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer définitivement ce chapitre?
      </div>
      <div class="modal-footer">
        <form method="post" action="<?=URL?>admin/delete_chapter">
            <input type="hidden" name="id" value="<?=$chapter->get_id()?>"/>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-danger">Supprimer le chapitre</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("content")</script>  

<span id="scroll_top"><i class="fas fa-arrow-up"></i></span>
<?php
}
?>