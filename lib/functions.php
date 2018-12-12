<?php
//include_once 'D:\Program Files\wamp\www\config.php';
    function email_filter($input){
        if(filter_var($input, FILTER_VALIDATE_EMAIL)){
            return TRUE;
        }
        return FALSE;
    }
    function input_filter($input=NULL){
        if(is_null($input)){
            return FALSE;
        } else {
            return htmlspecialchars(stripslashes(trim($input)));
        }
    }
    function filter_output($input){
        $output= htmlentities($input);
        echo $output;
    }
    function load_view($str){
        $url=base_dir.'view/'.$str.'.php';
        if(file_exists($url)){
            include_once ($url);
        }else{
            return FALSE;
        }
    }
    function add_message($mess='error acure!...',$type='danger'){
        ?>
        <div class="alert alert-<?php echo $type; ?> alert-dismissable">
            <a class="alert-link"><?php echo $mess; ?></a>
            <span class="close" data-dismiss="alert" >&times;</span>
        </div>
        <?php
    }
    function load_url($input=NULL){
        switch($input){
            case 2:
                $url= dirname(dirname(__FILE__))."\\";break;
            case 3:
                $url= dirname(dirname(dirname(__FILE__)))."\\";break;
            case 'lib':
                $url= "D:\Program Files\wamp\www\lib\\";break;
            case 'asset':
                $url= "D:\Program Files\wamp\www\asset\\";break;
            case 'controller':
                $url= "D:\Program Files\wamp\www\controller\\";break;
            case 'view':
                $url= "D:\Program Files\wamp\www\view\\";break;
            case 'model':
                $url= "D:\Program Files\wamp\www\model\\";break;
            default :
                $url= dirname(__FILE__)."\\";
        }
        echo $url;
    }
    
    function route_admin_page($input,$input2){
        switch ($input) {
            case 'delete':
                delete_page($input2);
                break;
            case 'hidden':
                hidden_page($input2);
                break;
            case 'show':
                show_page($input2);
                break;
            case 'user_delete':
                delete_user($input2);
                break;
        }
    }
    
    function dir_maked($input){
        //فایل آپلودر ناقص
        $exp=explode('.', $input);
        reset($exp);
        $dir=base_url.'asset/images/avatar/'.$exp;
        mkdir($dir,0777,TRUE);
        
    }