<?php 

namespace seyeadama\commentaire\model;

class Manager{

    protected function dbConnect(){
        $db = new  \PDO('mysql:host=localhost;dbname=test_blog;charset=utf8', 'root', '');
        return $db;
}
}
