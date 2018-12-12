<?php
    allow_user_admin();
    
    function get_title(){
        echo 'مدیریت';
    }
    
    function get_content(){
        if(isset($_GET['action'])&&isset($_GET['value'])){
            route_admin_page($_GET['action'],$_GET['value']);
        }
        if(isset($_GET['action'])&&$_GET['action']=='edit_page'){
            if(isset($_GET['value'])){
            $edit_page=get_page($_GET['value']);
            }

        }elseif(isset($_GET['action'])&&$_GET['action']=='user_edit'){
            user_edit_info($_GET['value']);
        }else {
            view_pages_list();
            view_users_list();
        }
    }
    
    
    function get_sidebar(){
        ?>
    <div class="list-group container text-center">
        <a href="<?php echo base_url; ?>admin_page.php?action=list" class="list-group-item list-group-item-danger list-group-item-action list-group-flush">
            view list of pages
        </a>
        <a href="<?php echo base_url; ?>create_page.php" class="list-group-item list-group-item-danger list-group-item-action list-group-flush">
            create pages
        </a>
    </div>
<?php
    }