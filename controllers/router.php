<?php

namespace Projet4\Controller;

use \Projet4\Controller\Accueil;
use \Projet4\Controller\Chapitre;
use \Projet4\Controller\Admin;
use \Projet4\View\View;

class Router{
    private $_view,
            $_controller;

    public function getController(){
        
        try{

            if(isset($_GET['url'])){
                
                $url=explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));
                $controller='Projet4\\Controller\\'.ucfirst(strtolower($url[0]));
                $controller_file='controllers/'.ucfirst(strtolower($url[0])).'.php';
            
                if(file_exists(ROOT.$controller_file)){   
                    $this->_controller=new $controller($url);

                    if(isset($url[1])){
                        $action=$url[1];
                    }
 
                    if(isset($action)){
                        if(method_exists($controller,$action)){
                            $this->_controller->$action();
                        }
                        else{
                            throw new \Exception('La page demandée n\'existe pas');
                        }
                    }
                    else{
                        $this->_controller->index();
                    }
                    
                }
                else{
                    throw new \Exception('La page demandée n\'existe pas');
                }

            }

            else{
                $accueil=new Accueil();
                $accueil->index();   
            }

        }
        catch(\Exception $e){
            $error_msg=$e->getMessage();
            $this->_view=new View('errorView','Erreur');
            $this->_view->generate(array('error_message'=>$error_msg));
        }
    } 
}
