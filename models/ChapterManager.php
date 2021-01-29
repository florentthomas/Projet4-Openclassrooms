<?php

namespace Projet4\Model;


use \Projet4\Model\ChapterModel;
use \Projet4\Model\Manager;


require(ROOT.'models/chapter.php');
require_once(ROOT.'models/Manager.php');

class ChapterManager extends Manager{

    public function get_chapters(){
        
        $req=$this->get_all("chapters");

        while($data=$req->fetch(\PDO::FETCH_ASSOC)){
            $chapters[]=new ChapterModel($data);
        }

        foreach($chapters as $chapter){
            $chapter->set_date_create(new \DateTime($chapter->get_date_create()));
            $chapter->set_date_update(new \DateTime($chapter->get_date_update()));
        }
        

        return $chapters;
    }

    public function get_chapter($id){

        $respons=$this->get_item('chapters',"id",$id);
        $data=$respons->fetch(\PDO::FETCH_ASSOC);
        $chapter=new ChapterModel($data);
        $chapter->set_date_create(new \DateTime($chapter->get_date_create()));
        $chapter->set_date_update(new \DateTime($chapter->get_date_update()));
    
        return $chapter;
        
    }

    public function update_chapter(ChapterModel $chapter){
        $sql="UPDATE chapters 
              SET title=:title, content=:content, author=:author, date_update=NOW()
              WHERE id=:id";
        
        $req=$this->bdd()->prepare($sql);

        $req->execute(Array("title" => $chapter->get_title(),
                            "content" => $chapter->get_content(),
                            "author" => $chapter->get_author(),
                            "id" => $chapter->get_id()));
    }

    public function add_chapter(ChapterModel $chapter){
        $sql="INSERT INTO chapters (title,content,author,date_create,date_update)
              VALUE(:title,:content,:author,NOW(),NOW())";

        $req=$this->bdd()->prepare($sql);

        $req->execute(Array("title" => $chapter->get_title(),
                            "content" => $chapter->get_content(),
                            "author" => $chapter->get_author()));
    }

    public function count_chapters(){
        $sql="SELECT COUNT(*) FROM chapters";
        $req=$this->bdd()->query($sql);
        $count_chapters=$req->fetch();
        return $count_chapters;
    }

    public function chapter_exists($id){
        $count_chapters=$this->count_chapters();
        if($id > 0 && $id <= $count_chapters[0]){
            return true;
        }

        return false;
    }
}