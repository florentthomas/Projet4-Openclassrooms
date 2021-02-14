<?php

if(isset($_SESSION['user'])){
  include('views/navAdmin.php');
?>


<section class="m-5" id="ecrire_un_chapitre">
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

<section class="m-5" id="modifier_chapitre">
  <h3>Modifier un chapitre</h3>
  <?php
    if(isset($chapters)){
      foreach($chapters as $chapter){
  ?>
        <div class="card mb-4">
        <div class="card-header">
          <?=htmlspecialchars($chapter->get_title())?>
           | Auteur: <?=htmlspecialchars($chapter->get_author())?>
          | Date: <?=htmlspecialchars($chapter->get_date_create()->format('d/m/Y à H:i'))?>
          <?php
          if($chapter->get_date_create() != $chapter->get_date_update()){
          ?>
            | Date de modification: <?=htmlspecialchars($chapter->get_date_update()->format('d/m/Y à H:i'))?>
          <?php
          }
          ?>
        </div>
        <div class="card-body">
          <p class="card-text"><?=substr($chapter->get_content(),0,300)?></p>
          
        </div>
        <form method="post" action="<?=URL?>admin/modify_chapter">
          <input type="hidden" name="chapter_id" value="<?=$chapter->get_id()?>"/>
          <button class="btn btn-primary m-3" type="submit">Modifier l'article</button>
        </form>
      </div>
  <?php
      }
    }
  ?>

</section>

<section class="m-5" id="commentaires_signales">
  <h3>Vous avez <?=isset($comments_signal) ? count($comments_signal) : '0'?> commentaire(s) signalé(s)</h3>
<?php
if(isset($comments_signal)){
  foreach($comments_signal as $comment_signal){
?>
  <span>Commentaire signalé <?=htmlspecialchars($comment_signal->get_signal_comment())?> fois</span>
  <div class="card mb-4">
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