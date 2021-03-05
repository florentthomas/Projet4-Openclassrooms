<?php

namespace Projet4\Tool;

use \Projet4\Model\ChapterManager;


class Tools{

    static public function rewrite_url(){

        $chaptersManager=new ChapterManager();

        $chapters=$chaptersManager->get_chapters();

        $search  = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');
        
        if($chapters != null){
            foreach($chapters as $chapter){
                $name_chapter_url=str_replace(' ','-',$chapter->get_title());
                $name_chapter_url=strtolower($name_chapter_url);
                $name_chapter_url = str_replace($search, $replace, $name_chapter_url);
                $name_chapter_url = preg_replace('/[^A-Za-z0-9-]/', '', $name_chapter_url);
                $name_chapters_url[]=$name_chapter_url;
            }
        }

        return $name_chapters_url;
        
    }
}