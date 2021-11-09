<?php 

include "./model/Database.php";

class BlogSingle{

    public function blog_single($blog_id){
        $obj = new Database();
        $res = $obj->getArticle($blog_id);
        return $res;
    }

}

$object = new BlogSingle();
$row = $object->blog_single($_GET['id']);

