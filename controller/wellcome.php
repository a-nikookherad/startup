<?php
    $load_lib=glob(base_dir."lib\*.php");
    foreach ($load_lib as $item){
        include_once $item;
    }
    $load_model=glob(base_dir."model\*.php");
    foreach ($load_model as $item){
        include_once $item;
    }
   
    
    function include_url(){
        $model_name= model_name();
        if(empty($model_name) || $model_name == 'index'){
            $model_name="home";
        }
        $url=base_dir."view\\".$model_name.".php";
        if(file_exists($url)){
            include_once $url;
        }elseif(page_exist($model_name)){
            global $db_page;
            $db_page= get_page($model_name);
            include_once base_dir."view/db_page_loader.php";
        }else{

        }
        load_page();
    }

    
    function load_page(){
        load_view('header');
        if(function_exists('get_content')){
            get_content();
        }else{
            add_message('this page is not exist!...');
        }
        load_view('footer');
    }
    
    
    
    
        function model_name(){
        $url=$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url, 'lib')){
            $storage=str_replace('http://localhost:8888/lib/', '', $url);
        }elseif (strpos($url, 'controller')) {
            $storage=str_replace('http://localhost:8888/controller/', '', $url);
        } elseif (strpos($url, 'model')) {
            $storage=str_replace('http://localhost:8888/model/', '', $url);
        } elseif (strpos($url, 'view')) {
            $storage=str_replace('http://localhost:8888/view/', '', $url);
        } else {
            $storage=str_replace('http://localhost:8888/', '', $url);
        }
        $num=strpos($storage, '?');
        if($num>0){
            $result= substr($storage, 0,$num);
//            $result=substr_replace($storage, '', $num);
            $num2= explode('.',$result);
            if(is_array($num2)){
                return reset($num2);
            }
            return $result;   
        }
        $num2= explode('.',$storage);
        if(is_array($num2)){
            return reset($num2);
        }
        return $storage;
    }