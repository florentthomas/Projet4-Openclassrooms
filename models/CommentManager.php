<?php
namespace Projet4\Model;

use \Projet4\Model\Comment;
use \Projet4\Model\Manager;

require(ROOT."models/Comment.php");

class CommentManager extends Manager{

    public function get_comments($id){
        $sql="SELECT *
              FROM comments
              WHERE comments.chapter_id = $id";

        $req=$this->bdd()->prepare($sql);
        $req->execute(Array('id' => $id));

        while($data=$req->fetch(\PDO::FETCH_ASSOC)){
            $comments[]=new Comment($data);
        }

        if(isset($comments) && $comments != null){
            foreach($comments as $comment){
                $comment->set_date_comment(new \DateTime($comment->get_date_comment()));
            }
            
            return $comments;
        }
        return;
    }
    
    public function count_comment($id){
        $sql="SELECT COUNT(*) FROM comments WHERE chapter_id=$id";
        $req=$this->bdd()->query($sql);
        $count_comment=$req->fetch();
        return $count_comment;
    }

    public function add_comment(Comment $comment){
        $sql='INSERT INTO comments (first_name,last_name,date_comment,comment,chapter_id)
              VALUES(:first_name,:last_name,NOW(),:comment,:chapter_id)
              ';
        $req=$this->bdd()->prepare($sql);
        $req->execute(Array('first_name' => $comment->get_first_name(),
                            'last_name' => $comment->get_last_name(),
                            'comment' => $comment->get_comment(),
                            'chapter_id' => $comment->get_chapter_id()));
    }

    public function signal_comment($id_comment){
        $sql='UPDATE comments SET signal_comment= signal_comment + 1 WHERE id= :id_comment';

        $req=$this->bdd()->prepare($sql);
        $req->execute(Array('id_comment' => $id_comment));
    }

}
