<?php

namespace Projet4\Model;

abstract class Manager{

    private $_bdd;

    protected function bdd(){
        $this->_bdd=new \PDO("mysql:host=localhost;dbname=project_4_oc;charset=utf8","root","");
        return $this->_bdd;
    }

    protected function get_all($table){
        $sql="SELECT * FROM $table";
        $data=$this->bdd()->query($sql);
        return $data;
    }

    protected function get_item($table,$champs,$condition){
        $sql="SELECT * FROM $table WHERE $champs=:condition";
        $req=$this->bdd()->prepare($sql);
        $req->execute(Array('condition' => $condition));
        return $req;
    }

    protected function delete($table,$id){
        $sql="DELETE FROM $table WHERE id=:id";
        $req=$this->bdd()->prepare($sql);
        $req->execute(Array("id" => $id));
    }
}