<?php
//CKE editor
namespace Projet4\Controller;

use \Projet4\view\view;

require(ROOT.'views/View.php');

class Admin{

    private $_view;

    public function index(){
        $this->set_view();
    }

    public function set_view(){
        $this->_view=new View('AdminView','Administration');
        $this->_view->generate();
    
    }
}