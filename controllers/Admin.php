<?php

namespace Projet4\Controller;

use \Projet4\view\view;
use \Projet4\Model\User;
use \Projet4\Model\UserManager;
use \Projet4\Model\CommentManager;
use \Projet4\Model\ChapterManager;
use \Projet4\Model\ChapterModel;

require(ROOT.'views/View.php');
require(ROOT.'models/UserManager.php');
require(ROOT.'models/CommentManager.php');
require(ROOT.'models/ChapterManager.php');
require_once(ROOT.'models/Chapter.php');


class Admin{

    private $_view;
    private $_userManager;


    public function index(){
        if(!isset($_SESSION['user'])){
            $this->_view=new View('ConnectionView','Se connecter');
            $this->_view->generate();   
        }
        else{
            $comment_manager=new CommentManager;
            $comments_signal=$comment_manager->get_comments_signal();
            $chapterManager=new ChapterManager;
            //var_dump($comments_signal);
            $this->_view=new View('AdminView','Administration');
            $this->_view->generate(Array('comments_signal'=>$comment_manager->get_comments_signal(),
                                         'chapters'=>$chapterManager->get_chapters()));
        }
    }

    public function connection(){
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
    }

    public function disconnect(){
        session_destroy();
        header('Location:'.URL.'admin');
    }

    public function modify_chapter(){
        try{
            $chapterManager=new ChapterManager;
           
            if(isset($_POST['chapter_id']) && $_POST['chapter_id'] > 0 && $chapterManager->chapter_exists($_POST['chapter_id'])){
                $this->_view=new View('Modify_chapterView','Modifier un chapitre');
                $this->_view->generate(array('chapter' =>$chapterManager->get_chapter($_POST['chapter_id'])));
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
                $chapterManager=new ChapterManager;
                if($chapterManager->chapter_exists($_POST['id'])){
                    $data=Array('id' =>$_POST['id'],
                                'title' =>$_POST['title'],
                                'content' =>$_POST['content'],
                                'author' =>$_POST['author']);
                   
                    $chapterManager->update_chapter(new ChapterModel($data));
                    header('Location:'.URL.'admin');
                }
                else{
                    Throw new \Exception('Le chapitre n\'existe pas');
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
            $chapterManager=new ChapterManager;
            $commentManager=new CommentManager;
            if(isset($_POST['id']) && $chapterManager->chapter_exists($_POST['id'])){
                $chapterManager->delete('chapters',$_POST['id']);
                $commentManager->delete_comments($_POST['id']);
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
            $commentManager=new CommentManager;
            
            if(isset($_POST['id'])){

                if(isset($_POST['supprimer']) && $commentManager->comment_exists($_POST['id']) != false){
                   
                    $commentManager->delete('comments',$_POST['id']);
                    header('Location:'.URL.'admin');
                }
                elseif(isset($_POST['approuver'])){
                    $commentManager->approve_comment($_POST['id']);
                    header('Location:'.URL.'admin');
                }
                else{
                    Throw new \Exception('Erreur veuillez renouveller l\'opération');
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
                
                $chapterManager=new ChapterManager;

                $data=Array('title' => $_POST['title'], 'author' => $_POST['author'], 'content' => $_POST['content']);

                $chapter=new ChapterModel($data);

                $chapterManager->add_chapter($chapter);

                header('Location:'.URL.'admin');


            }
            else{
                throw new \Exception('Les champs ne sont pas saisis');
                
            }
        }

        catch(\Exception $a){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    }
}