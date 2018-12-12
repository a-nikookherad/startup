<?php
    define('time_expire', 3600);

    function user_login($username,$password){
        session_unset();
        if(exist_user2($username,$password)){
            $storage=get_user($username);
            $_SESSION['username']=$storage['username'];
            $_SESSION['password']=$storage['password'];
            $_SESSION['time']=time();
            $get_user=get_user($username);
            if($get_user['username']=='admin'){
                header('location:http://localhost:8888/admin_page.php');
            } 
            else {
                header('location:http://localhost:8888/dashboard.php');
            }
        }else{
            add_message('username or password is wrong!...');
        }
    }

    function current_user(){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])&& isset($_SESSION['time']) ){
            if(exist_user($_SESSION['username'], $_SESSION['password'])&&($_SESSION['time']+time_expire)>time()){
                return TRUE;
            } else {
                user_logout();
                return FALSE;    
            }
        } else {
            return FALSE;
        }
    }
    function admin_user(){
        if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
            if(exist_user($_SESSION['username'], $_SESSION['password'])&&$_SESSION['username']=='admin'){
            return TRUE;
            } else {
                return FALSE;    
            }
        } else {
            return FALSE;
        }
    }
    
    function user_signup($username,$password,$fname,$lname,$email){
        session_unset();
        $_SESSION['username']=$username;
        $_SESSION['fname']=$username;
        $_SESSION['lname']=$username;
        $_SESSION['email']=$username;
        if(exist_user($username)){
            add_message('this user already axist!...');
        } else {
            insert_user($username, $password, $fname, $lname, $email);
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header('location:'.base_url.'sign_in.php');
        }
    }
    function user_logout(){
        session_unset();
        session_destroy();
    }
    
    function allow_user_admin(){
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            header("location:".base_url."sign_in.php");
            die();
        }elseif (current_user()==FALSE) {
            header("location:".base_url."sign_in.php");
            die();
        }else{
            if(admin_user()==FALSE){
                header("location:".base_url."sign_in.php");
                die();
            }
        }
    }
    
    function allow_user(){
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            header("location:".base_url."sign_in.php");
            die();
        }else{
            if(current_user()==FALSE){
                header("location:".base_url."sign_in.php");
                die();
            }
        }
    }