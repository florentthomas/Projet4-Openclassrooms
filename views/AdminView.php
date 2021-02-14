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
      <a class="nav-item nav-link" href="<?=URL?>admin#ecrire_un_chapitre">Créer un nouveau chapitre</a>
      <a class="nav-item nav-link" href="<?=URL?>admin#modifier_chapitre">Modifier un chapitre</a>
      <a class="nav-item nav-link" href="<?=URL?>admin#commentaires_signales">commentaires signalés</a>
      <a class="nav-item nav-link" href="<?=URL?>">Revenir au blog</a>
      <a class="nav-item nav-link" href="<?=URL?>admin/disconnect">Se déconnecter</a>
    </div>
  </div>
  
</nav>
<section id="ecrire_un_chapitre">
  <h3>Ajouter un nouveau chapitre</h3>
  <form method="post" action="<?=URL?>admin/add_chapter">
      <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <textarea name="content" cols="30" rows="10"></textarea>
      <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" class="form-control" id="author" name="author" required>
      </div>
      <button type="submit" class="btn btn-primary">Valider</button>
  </form>


</section>

<section id="modifier_chapitre">
  <h3>Modifier un chapitre</h3>
  <?php
    if(isset($chapters)){
      //var_dump($chapters);
      foreach($chapters as $chapter){
  ?>
        <div class="card">
        <div class="card-header">
          <?=htmlspecialchars($chapter->get_title())?>
           | Auteur: <?=htmlspecialchars($chapter->get_author())?>
          | Date: <?=htmlspecialchars($chapter->get_date_create()->format('d/m/Y à h:i'))?>
          <?php
          if($chapter->get_date_create() != $chapter->get_date_update()){
          ?>
            | Date de modification: <?=htmlspecialchars($chapter->get_date_update()->format('d/m/Y à h:i'))?>
          <?php
          }
          ?>
        </div>
        <div class="card-body">
          <p class="card-text"><?=substr($chapter->get_content(),0,300)?></p>
          
        </div>
        <form method="post" action="<?=URL?>admin/modify_chapter">
          <input type="hidden" name="chapter_id" value="<?=$chapter->get_id()?>"/>
          <button class="btn btn-primary" type="submit">Modifier l'article</button>
        </form>
      </div>
  <?php
      }
    }
  ?>

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
    <?=htmlspecialchars($comment_signal->get_date_comment()->format('d/m/Y à H:i'))?>
  </div>
  <div class="card-body">
    <p class="card-text"><?=htmlspecialchars($comment_signal->get_comment())?></p>
    <form method="post" action="<?=URL?>admin/comment_signal">
      <input type="hidden" name="id" value="<?=$comment_signal->get_id()?>"/>
      <button type="submit" class="btn btn-primary" name="approuver">Approuver le commentaire</button>
      <button type="submit" class="btn btn-danger" name="supprimer">Supprimer le commentaire</button>
    </form>
  </div>
</div>
<?php
  }
}
?>
</section>

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("content")</script>    

<?php
}
?>
<span id="scroll_top"><i class="fas fa-arrow-up"></i></span>