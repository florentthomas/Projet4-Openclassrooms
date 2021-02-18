<?php
include('views/navView.php');
?>

<header>
</header>


<section class="d-md-flex bg-secondary text-white p-5" id="qui_suis_je">

    <div class="col-md-4 align-self-center" style="text-align:center">
      <img src="public/images/Jean_Forteroche.jpg" class="rounded-circle img-fluid center-block" alt="photo de Jean Forteroche"/>
    </div>

    <div class="col-md-8 mt-4 align-self-center">
        <h2 class="text-center">Qui je suis?<h2>
        <p class="text-center">Je m'appelle Jean Forteroche je suis un écrivain, photographe et globetrotter.
            Je suis l'auteur de 5 ouvrages, mes inspirations je les trouve dans mes voyages à travers le monde</p>
    </div>

</section>

<section id="chapters" class="mt-5">

  <h1 class="text-center">Un billet simple pour l'Alaska</h1>
  <p class="text-center">Découvrez les premiers chapitres de mon nouveau roman <span class="font-weight-bold">Un billet simple pour l'Alaska</span></p>
  
  <?php
  if(isset($chapters)){
    $i=0;
    foreach($chapters as $chapter){
    ?>
    <div class="card m-5 shadow">
      <div class="card-body">
        <h5 class="card-title"><?=htmlspecialchars($chapter->get_title())?></h5>
        <p class="card-text"><?=substr($chapter->get_content(),0,300).' ...'?></p>
      
        <a href="chapitre/view/<?=htmlspecialchars($chapter->get_id())?>/<?=$name_chapters_url[$i]?> " class="btn btn-primary">Lire le chapitre</a>
        
      </div>
    </div>
    <?php
      ++$i;
    }
  }
  ?>

</section>



<?php
include('views/FooterView.php');
?>

<span id="scroll_top"><i class="fas fa-arrow-up"></i></span>