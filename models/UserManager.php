<?php

namespace Projet4\Model;

use Projet4\Model\Manager;


class UserManager extends Manager{

    public function get_user($email,$password){

        $sql="SELECT * FROM users WHERE email=:email";

        $req=$this->bdd()->prepare($sql);

        $req->execute(array(':email' => $email));
        
        $user=$req->fetch(\PDO::FETCH_ASSOC);

        $password_check=password_verify($password,$user['password_user']);

        if($password_check){
            return $user;
        }

        return false;
    }
}