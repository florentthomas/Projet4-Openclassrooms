<?php

namespace Projet4\Model;

use Projet4\Model\Manager;
require_once(ROOT.'models/Manager.php');

class UserManager extends Manager{

    public function get_user($email,$password){
        $sql="SELECT * FROM users WHERE email=$email AND password_user=$password";

    }
}