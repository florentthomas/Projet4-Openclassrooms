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
        $this->_view=new View('AccueilView','Jean Forteroche');

        $search  = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
        
        if($chapters != null){
            foreach($chapters as $chapter){
                $name_chapter_url=str_replace(' ','-',$chapter->get_title());
                $name_chapter_url=strtolower($name_chapter_url);
                $name_chapter_url = str_replace($search, $replace, $name_chapter_url);
                $name_chapter_url = preg_replace('/[^A-Za-z0-9-]/', '', $name_chapter_url);
                $name_chapters_url[]=$name_chapter_url;
            }
            
            $this->_view->generate(array('chapters' => $this->_chapterManager->get_chapters(),
                                         'name_chapters_url' =>$name_chapters_url));
        }

        else{
            $this->_view->generate();
        }    
    }
}