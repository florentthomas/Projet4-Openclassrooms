<?php

namespace Projet4\Model;

require_once(ROOT."models/Hydrate.php");

class ChapterModel{

    use hydrate;

    private $_title,
            $_id,
            $_content,
            $_author,
            $_date_create,
            $_date_update;

    public function __construct(Array $data){
        $this->hydrate($data);
    }

    public function set_title($title){
        if(is_string($title)){
            $this->_title=$title;
        }
    }

    public function set_id($id){
        if(is_numeric($id)){
            $this->_id=$id;
        }
    }

    public function set_content($content){
        if(is_string($content)){
            $this->_content=$content;
        }
    }

    public function set_author($author){
        if(is_string($author)){
            $this->_author=$author;
        }
    }

    public function set_date_create($date_create){
            $this->_date_create=$date_create;
    }

    public function set_date_update($date_update){
            $this->_date_update=$date_update;
    }

    public function get_title(){
        return $this->_title;
    }

    public function get_id(){
        return $this->_id;
    }

    public function get_content(){
        return $this->_content;
    }

    public function get_author(){
        return $this->_author;
    }

    public function get_date_create(){
        return $this->_date_create;
    }

    public function get_date_update(){
        return $this->_date_update;
    }
}