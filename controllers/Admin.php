<?php

namespace Projet4\Controller;

use \Projet4\view\view;
use \Projet4\Model\User;
use \Projet4\Model\UserManager;
use \Projet4\Model\CommentManager;
use \Projet4\Model\ChapterManager;

require(ROOT.'views/View.php');
require(ROOT.'models/UserManager.php');
require(ROOT.'models/CommentManager.php');
require(ROOT.'models/ChapterManager.php');


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

}