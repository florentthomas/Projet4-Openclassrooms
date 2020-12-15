<?php
require('views/navView.php');
?>

<article class="p-5">
    <h1 class="text-center"><?=htmlspecialchars($chapter_item->get_title())?></h1>
    <p><?=htmlspecialchars($chapter_item->get_content())?></p>
</article>


<form method='post' action="<?=URL?>chapitre/<?=$chapter_item->get_id()?>/comment" class="p-5">

    <input type="hidden" value="<?=$chapter_item->get_id()?>" name="chapter_id"/>

  <div class="form-group">
    <label for="first_name">Prénom</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Prénom" required>
  </div>

  <div class="form-group">
    <label for="last_name">Nom</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom" required>
  </div>

  <div class="form-group">
    <label for="comment">Commentaire</label>
    <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
  </div>

  <input class="btn btn-outline-success btn-lg btn-block" type="submit" value="Valider">
  
</form>


<section class="p-5">
    <h2>Commentaires: <?=$count_comment[0]?></h2>
  
   
    <?php
    
    if(isset($comments)){
        
        foreach($comments as $comment){
    ?>
        <div class="card mt-5">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                <?=htmlspecialchars($comment->get_first_name()) ?>
                <?=htmlspecialchars($comment->get_last_name()) ?>
                <?=htmlspecialchars($comment->get_date_comment()->format('d/m/Y à h:i'))?>
                <div><button class="btn btn-danger" id="signal">Signaler</button></div>
            </h5>

            <div class="card-body">
                <p class="card-text"><?=htmlspecialchars($comment->get_comment())?></p>    
            </div>
        </div>
        
    <?php   
        }
    }
    ?>
    
</section>

