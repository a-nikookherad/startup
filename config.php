<?php
    session_start();
    define('base_url', 'http://localhost:8888/');
    define('base_dir', 'C:\xampp\htdocs\\');
    $load_controller=glob(base_dir.'controller\\*.php');
    foreach ($load_controller as $item){
        include_once "$item";
    }
    