<?php 
require('controller/frontend.php');

if(isset($_GET['action'])){
    if($_GET['action']=='listPosts'){
        listPosts();
    }else if($_GET['action']=='post'){
        if(isset($_GET['id']) && $_GET['id']>0){
            post();
        }else{
            echo 'error not found id paramter !!';
        }
    }
}else{
    listPosts();
}