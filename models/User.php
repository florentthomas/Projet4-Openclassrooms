<?php

namespace Projet4\Model;

require_once(ROOT."models/Hydrate.php");

class User{

    use hydrate;
    
    private $_email,
            $_password,
            $_firstname,
            $_lastname;
    
    public function __construc($data){
        $this->hydrate($data);
    }

    public function set_email($email){
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#" , $email)) {
            $this->_email=$email;
        }
    }

    public function set_password($password){
        $password=password_hash($password, PASSWORD_DEFAULT);
        $this->_password=$password;
    }

    public function set_firstname($firstname){
        $this->_firstname=$firstname;
    }

    public function set_lastname($lastname){
        $this->_lastname=$lastname;
    }

    public function get_password(){
        return $this->_password;
    }

    public function get_email(){
        return $this->_email;
    }

    public function get_firstname(){
        return $this->get_firstname;
    }

    public function get_lastname(){
        return $this->_lastname;
    }
}