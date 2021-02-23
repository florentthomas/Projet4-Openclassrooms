<?php
namespace Projet4\Model;

use \Projet4\Model\Comment;
use \Projet4\Model\Manager;

class CommentManager extends Manager{

    public function get_comments($id){
        $sql="SELECT *
              FROM comments
              WHERE comments.chapter_id = :id
              ORDER BY date_comment DESC";

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

    public function get_comments_signal(){
        $sql="SELECT * FROM comments WHERE signal_comment >= 1 ORDER BY signal_comment DESC";

        $req=$this->bdd()->query($sql);
        while($data=$req->fetch(\PDO::FETCH_ASSOC)){
            $comments_signal[]=new Comment($data);
        }

        if(isset($comments_signal) && $comments_signal != null){
            foreach($comments_signal as $comment_signal){
                $comment_signal->set_date_comment(new \DateTime($comment_signal->get_date_comment()));
            }
            
            return $comments_signal;
        }
        
        return;
        
    }
    
    public function count_comment($id){
        $sql="SELECT COUNT(*) FROM comments WHERE chapter_id=$id";
        $req=$this->bdd()->query($sql);
        $count_comment=$req->fetch();
        return $count_comment;
    }

    public function comment_exists($id){
        $sql="SELECT id FROM comments WHERE id=:id";

        $req=$this->bdd()->prepare($sql);

        $req->execute(Array('id'=>$id));

        $response=$req->fetch(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function approve_comment($id){
        $sql="UPDATE comments SET signal_comment = 0 WHERE id=:id";

        $req=$this->bdd()->prepare($sql);

        $req->execute(Array("id" => $id));
    }

    public function add_comment(Comment $comment){
        $sql='INSERT INTO comments (first_name,last_name,comment,chapter_id)
              VALUES(:first_name,:last_name,:comment,:chapter_id)
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

    public function delete_comments($chapter_id){
        $sql='DELETE FROM comments WHERE chapter_id= :chapter_id';

        $req=$this->bdd()->prepare($sql);

        $req->execute(Array('chapter_id' => $chapter_id));
    }

    public function delete_comment($id){
        $this->delete('comments',$id);
    }

}
