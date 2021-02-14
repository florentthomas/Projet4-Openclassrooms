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