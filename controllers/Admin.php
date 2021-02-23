<?php

namespace Projet4\Controller;

use \Projet4\view\view;
use \Projet4\Model\User;
use \Projet4\Model\UserManager;
use \Projet4\Model\CommentManager;
use \Projet4\Model\ChapterManager;
use \Projet4\Model\Chapter;


class Admin{

    private $_view;
    private $_userManager;
    private $_commentManager;
    private $_chapterManager;

    public function __construct(){
        $this->_commentManager=new CommentManager;
        $this->_chapterManager=new ChapterManager;
    }

    public function index(){
        if(!isset($_SESSION['user'])){
            $this->_view=new View('ConnectionView','Se connecter');
            $this->_view->generate();   
        }
        else{
            
            $this->_view=new View('AdminView','Administration');
            $this->_view->generate(Array('comments_signal'=>$this->_commentManager->get_comments_signal(),
                                         'chapters'=>$this->_chapterManager->get_chapters()));
        }
    }

    public function connection(){
        try{
            if(!empty($_POST['email']) && !empty($_POST["password"])){
      
                $this->_userManager=new UserManager();
                $user=$this->_userManager->get_user($_POST['email'],$_POST['password']);
                if($user != false){
                    $_SESSION['user']=$user;
                    header('Location:'.URL.'admin');
                }else{
                    $this->_view=new View('ConnectionView','Se connecter');
                    $this->_view->generate(array('error_connection' =>''));
                }
            }
            else{
                Throw new \Exception('Les champs ne sont pas remplis');
            }

        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
        
    }

    public function disconnect(){
        session_destroy();
        header('Location:'.URL.'admin');
    }

    public function modify_chapter(){
        try{
            
            if(isset($_POST['chapter_id']) && $this->_chapterManager->chapter_exists($_POST['chapter_id'])){
                $this->_view=new View('Modify_chapterView','Modifier un chapitre');
                $this->_view->generate(array('chapter' =>$this->_chapterManager->get_chapter($_POST['chapter_id'])));
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

    public function apply_modification(){
        try{
           
            if(isset($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])){
              
                if($this->_chapterManager->chapter_exists($_POST['id'])){
                    $data=Array('id' =>$_POST['id'],
                                'title' =>$_POST['title'],
                                'content' =>$_POST['content'],
                                'author' =>$_POST['author']);
                   
                    $this->_chapterManager->update_chapter(new Chapter($data));
                    header('Location:'.URL.'admin');
                }
                else{
                    Throw new \Exception('Le chapitre n\'existe pas, modification impossible à effectuer');
                }
            }
            else{
                Throw new \Exception('Modification impossible! Tous les champs ne sont pas remplis');
            }
        }

        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }

    public function delete_chapter(){

        try{
            if(isset($_POST['id']) && $this->_chapterManager->chapter_exists($_POST['id'])){
                $this->_chapterManager->delete_chapter('chapters',$_POST['id']);
                $this->_commentManager->delete_comments($_POST['id']);
                header('Location:'.URL.'admin');
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

    public function comment_signal(){
        try{
            
            if(isset($_POST['id']) && $this->_commentManager->comment_exists($_POST['id'])){

                if(isset($_POST['supprimer'])){
                   
                    $this->_commentManager->delete('comments',$_POST['id']);
                    header('Location:'.URL.'admin');
                }
                elseif(isset($_POST['approuver'])){
                    $this->_commentManager->approve_comment($_POST['id']);
                    header('Location:'.URL.'admin');
                }
                else{
                    Throw new \Exception('Erreur: l\'opération n\'a pas pu être effectuée');
                }
            }

            else{
                Throw new \Exception('Commentaire non identifié');
            }
            
        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }

    public function add_chapter(){
        try
        {
            if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['content'])){
                
                $data=Array('title' => $_POST['title'], 'author' => $_POST['author'], 'content' => $_POST['content']);

                $chapter=new Chapter($data);

                $this->_chapterManager->add_chapter($chapter);

                header('Location:'.URL.'admin');


            }
            else{
                throw new \Exception('Les champs ne sont pas saisis');
                
            }
        }

        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }
}