<nav class="navbar navbar-expand-lg navbar-light bg-info text-white bg-light">

  <a class="navbar-brand" href="../accueil">
    <img src="public/images/Jean_Forteroche.jpg" class="rounded-circle center-block" style="max-width:50px" alt="photo de Jean Forteroche"/>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="">Qui suis-je?</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Un billet simple pour l'Alaska</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Chapitres
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
            foreach($chapters as $chapter){
            ?>
            <a class="dropdown-item" href='chapitre/<?=htmlspecialchars($chapter->get_id())?>'><?=htmlspecialchars($chapter->get_title())?></a>
            <?php
              
            }
            ?>
        </div>
      </li>
    </ul>
  </div>
</nav>