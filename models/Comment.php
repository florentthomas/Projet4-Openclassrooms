<?php

namespace Projet4\Model;

class Comment{

    use hydrate;

    private $_id,
            $_first_name,
            $_last_name,
            $_date_comment,
            $_chapter_id,
            $_signal_comment,
            $_comment;

    public function __construct(Array $data){
        $this->hydrate($data);
    }
            
    public function set_id($id){
        if(is_numeric($id) && $id > 0){
            $this->_id=$id;
        }
    }

    public function set_first_name($first_name){
        if(is_string($first_name)){
            $this->_first_name=$first_name;
        }
    }

    public function set_last_name($last_name){
        if(is_string($last_name)){
            $this->_last_name=$last_name;
        }
    }

    public function set_date_comment($date_comment){
        $this->_date_comment=$date_comment;
    }

    public function set_chapter_id($chapter_id){
        if(is_numeric($chapter_id) && $chapter_id > 0){
            $this->_chapter_id=$chapter_id;
        }
    }

    public function set_signal_comment($signal_comment){
        if(is_numeric($signal_comment)){
            $this->_signal_comment=$signal_comment;
        }
    }

    public function set_comment($comment){
        if(is_string($comment)){
            $this->_comment=$comment;
        }
    }

    public function get_id(){
        return $this->_id;
    }

    public function get_first_name(){
        return $this->_first_name;
    }

    public function get_last_name(){
        return $this->_last_name;
    }

    public function get_date_comment(){
        return $this->_date_comment;
    }

    public function get_chapter_id(){
        return $this->_chapter_id;
    }

    public function get_signal_comment(){
        return $this->_signal_comment;
    }

    public function get_comment(){
        return $this->_comment;
    }
}