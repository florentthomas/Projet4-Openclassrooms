<?php

namespace Projet4\Controller;

use \Projet4\view\view;
use \Projet4\Model\User;
use \Projet4\Model\UserManager;

require(ROOT.'views/View.php');


class Admin{

    private $_view;


    public function index(){
        if(!isset($_SESSION['user'])){
            $this->_view=new View('ConnectionView','Se connecter');
            $this->_view->generate();
        }
        // $this->set_view();
    }

    public function connection(){
        if(!empty($_POST['email']) && !empty($_POST["password"])){

        }
    }

    public function set_view(){
        $this->_view=new View('AdminView','Administration');
        $this->_view->generate();
    
    }
}