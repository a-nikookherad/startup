<?php
    allow_user();
    
    function get_title(){
        echo 'مدیریت';
    }
    
    function get_content(){
        add_message('wellcome to dashboard','success');

    }