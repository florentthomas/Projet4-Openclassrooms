<?php
namespace Projet4\Controller;

use \Projet4\Model\ChapterManager;
use \Projet4\Model\CommentManager;
use \Projet4\View\View;
use \Projet4\Model\Comment;

require(ROOT.'models/ChapterManager.php');
require(ROOT.'models/CommentManager.php');
require(ROOT.'views/View.php');

class Chapitre{

    private $_chapterManager,
            $_commentManager,
            $_view,
            $_url;

    public function __construct($url){
        $this->_chapterManager=new ChapterManager;
        $this->_commentManager= new CommentManager;
        $this->_url=$url;
    }

    public function view(){
        try{
           
            $id_chapter=$this->_url[2];

            //controle du parametre $_GET representant l'id du chapitre
            if(is_numeric($id_chapter) && $this->_chapterManager->chapter_exists($id_chapter)){

                //Definition de la page vue, envoie des données sous forme de tableau
                $this->_view=new View('chapterView',$this->_chapterManager->get_chapter($id_chapter)->get_title());

                $this->_view->generate(array('chapter_item'=>$this->_chapterManager->get_chapter($id_chapter),
                                     'chapters' => $this->_chapterManager->get_chapters(),
                                     'count_comment' => $this->_commentManager->count_comment($id_chapter),
                                     'comments' => $this->_commentManager->get_comments($id_chapter)));
            }

            else{
                Throw new \Exception('Le chapitre n\'existe pas');
            }        
        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }

    public function comment(){
        try{
            if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['comment']) && !empty($_POST['chapter_id'])){
                $comment=new Comment(Array("first_name" => $_POST['first_name'],
                                           'last_name' => $_POST['last_name'],
                                           'comment' => $_POST['comment'],
                                           'chapter_id' => $_POST['chapter_id']));
               
                $this->_commentManager->add_comment($comment);
            
                header('Location:'.URL."chapitre/view/".$this->_url[2]);
            }
            else{
                Throw New \Exception('Le formulaire n\'est pas complet');
            }
         //Paramêtres POST du formulaire pour poster commentaire sur un chapitre
         
        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }

    public function signal(){
        try{
            if(isset($_POST['id_comment'])){
                $this->_commentManager->signal_comment($_POST['id_comment']);
                header('Location:'.URL."chapitre/view/".$this->_url[2]);
            }
            else{
                throw new \Exception('Identifiant du commentaire non valide, impossible de le signaler');
                
            }

        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
        
    }
}