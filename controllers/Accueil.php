<?php
namespace Projet4\Controller;

use \Projet4\Model\ChapterManager;
use \Projet4\View\View;

require(ROOT.'views/View.php');
require(ROOT.'models/ChapterManager.php');


class Accueil{

    private $_view,
            $_chapterManager;

    public function __construct(){
        $this->_chapterManager=new ChapterManager;
    }
    
    public function index(){
        $this->set_view();
    }

    public function set_view(){
        $this->_view=new View('AccueilView','Jean Forteroche');
        $this->_view->generate(array('chapters' => $this->_chapterManager->get_chapters()));
    }

}