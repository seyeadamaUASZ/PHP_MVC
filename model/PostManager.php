<?php 

namespace seyeadama\commentaire\model;

require_once('Manager.php');
class PostManager extends Manager{

    function getPosts(){
    $db=$this->dbConnect();
	//on récupère les 5 derniers billets
    $req=$db->query('SELECT id,title,content,date_format(creation_date,\'%d/%m/%y à %H%imin%ss\') as creation_date_fr FROM posts ORDER BY creation_date DESC');
    
    return $req;
}

//post with parameter id

function getPost($postId){
    $db=$this->dbConnect();
    $req = $db->prepare('SELECT id,title,content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

}