<?php 
//require('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

use  \seyeadama\commentaire\model\PostManager;       //namespace
use \seyeadama\commentaire\model\CommentManager;

function listPosts(){
    $postManager = new  PostManager();
    $posts =$postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

function post(){
    $postManager = new  PostManager();
    $commentManager = new  CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

//for to add comment

function addComment($postId, $author, $comment){
    $commentManager = new  CommentManager();
   $affectedLines = $commentManager->postComment($postId, $author, $comment);
   if($affectedLines == false){
       throw new Exception('Impossible d\'ajouter le commentaire !');
   }else{
       header('Location: index.php?action=post&id=' . $postId);
   }
}