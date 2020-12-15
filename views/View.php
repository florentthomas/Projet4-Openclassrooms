<?php

namespace Projet4\View;

class View{
    private $_title;
    private $_file;

    public function __construct($file,$title){
        $this->_file=ROOT."views/".$file.".php";
        $this->_title=htmlspecialchars($title);
    }

    public function generate($data=[]){
        $content=$this->generateFile($this->_file,$data);
        $view=$this->generateFile("views/template.php",array('title' => $this->_title,'content' => $content));

        echo $view;
    }

    public function generateFile($file,$data){
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
    }
}