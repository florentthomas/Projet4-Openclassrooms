<?php
namespace Projet4\Controller;

use \Projet4\Model\ChapterManager;
use \Projet4\View\View;

class Accueil{

    private $_view,
            $_chapterManager;

    public function __construct(){
        $this->_chapterManager=new ChapterManager;
    }
    
    public function index(){
        $chapters=$this->_chapterManager->get_chapters();
        $description="Je m'appelle Jean Forteroche je suis un écrivain, photographe et globetrotter. Je suis l'auteur de 5 ouvrages, mes inspirations je les trouve dans mes voyages à travers le monde";
        $this->_view=new View('AccueilView','Jean Forteroche',$description);

        
        if($chapters != null){

            $this->_view->generate(array('chapters' => $chapters));
        }

        else{
            $this->_view->generate();
        }    
    }
}