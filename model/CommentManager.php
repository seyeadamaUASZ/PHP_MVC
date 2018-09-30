<?php 

namespace seyeadama\commentaire\model;

require_once('Manager.php');
class CommentManager extends Manager{

    function getComments($postId){
    $db=$this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comments, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}
    
    function postComment($postId,$author,$comment){
    $db =$this-> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comments, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}


}