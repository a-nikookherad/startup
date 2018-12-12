<?php

//database bind
function db_bind() {
    $db = new mysqli('localhost', 'root', '', 'my_web_db');
    if ($db->connect_error) {
        die('connect to db is failed' . $db->connect_error);
    }else{
        $db->set_charset("utf8");
    }
    return $db;
}



//article data base table
class post{
    private $title;
    private $author;
    private $cat;
    private $content;
    private $date_time;
    
    function insert_post() {
        $query = "";
    }

    function update_post() {
        $query = "";
    }

    function get_post() {
        $query = "";
    }

    function delete_post() {
        $query = "";
    }
}

//categori data base table
class cat{
    private $catname;
    
    function insert_cat() {
        $query = "";
    }

    function update_cat() {
        $query = "";
    }

    function get_cat() {
        $query = "";
    }

    function delete_cat() {
        $query = "";
    }
    
}

//author data base table
class author{
    private $fname;
    private $lname;
    private $nikname;
    private $image;
    private $skills;
    
    function insert_author() {
        $query = "";
    }

    function update_author() {
        $query = "";
    }

    function get_author() {
        $query = "";
    }

    function delete_author() {
        $query = "";
    }
}   
