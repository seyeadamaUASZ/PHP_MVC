<?php

function getPosts(){
    $db=dbConnect();
	//on récupère les 5 derniers billets
    $req=$db->query('SELECT id,title,content,date_format(creation_date,\'%d/%m/%y à %H%imin%ss\') as creation_date_fr FROM posts ORDER BY creation_date DESC');
    
    return $req;
}

//post with parameter id

function getPost($postId){
    $db=dbConnect();
    $req = $db->prepare('SELECT id,title,content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId){
    $db=dbConnect();
    $comments = $db->prepare('SELECT id, author, comments, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}


//creeons une fonction pour la connexion

function dbConnect(){
      try
    {
        $db = new PDO('mysql:host=localhost;dbname=test_blog;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}