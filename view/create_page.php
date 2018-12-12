<?php
allow_user_admin();
function get_title(){
    return 'create page';
}
function get_content(){
    if(isset($_GET['action'])&&$_GET['action']=='edit_page'){
        if(isset($_GET['value'])){
        $edit_page=get_page($_GET['value']);
        }
    }
    if(isset($_POST['title'])&&isset($_POST['slug'])&&isset($_POST['content'])&&isset($_POST['hidden'])) {
        $title= input_filter($_POST['title']);
        $slug= input_filter($_POST['slug']);
        $content= input_filter($_POST['content']);
        $hidden= input_filter($_POST['hidden']);
        create_page( $title, $slug, $content, $hidden);
    }
        ?>
<form  method="post">
        <table class="table table-danger table-hover table-striped">
            <tr>
                <td>عنوان:</td>
                <td><input type="text" class="form-control" name="title" placeholder="title" value="<?php if(isset($edit_page['title'])){echo $edit_page['title'];} ?>" required></td>
            </tr>
            <tr>
                <td>نامک:</td>
                <td><input type="text" class="form-control" name="slug" placeholder="slug" value="<?php if(isset($edit_page['slug'])){echo $edit_page['slug'];} ?>" required></td>
            </tr>
            <tr>
                <td>محتوا:</td>
                <td><textarea class="form-control" name="content" id="text_area"  cols="100%" rows="10"><?php if(isset($edit_page['content'])){echo $edit_page['content'];} ?></textarea></td>
            </tr>
            <tr>
                <td>مخفی:</td>
                <td><input type="checkbox" name="hidden" value="1" <?php if(isset($edit_page['hidden'])&&$edit_page['hidden']==1){echo 'checked';} ?>></td>
            </tr>
            <tr>
                <td><input type="reset" value="reset form" class="form-control btn btn-danger"></td>
                <td><input type="submit" value="save page" class="form-control btn btn-success"></td>
            </tr>
        </table>        
    </form>
            <?php 
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