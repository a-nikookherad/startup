<?php

//page data base table
function create_page($title,$slug,$content,$hidden) {
    if (page_exist($slug)) {
        update_page($title, $slug, $content, $hidden);
    } else {
        insert_page($title, $slug, $content, $hidden);
    }
}

function insert_page($title, $slug, $content, $hidden) {
    $db = db_bind();
    $query = "insert into tbl_pages(pageid,title,slug,content,hidden)values(NULL,'$title','$slug','$content','$hidden');";
    $db->query($query);
    $db->close();
}

function update_page($title, $slug, $content, $hidden) {
    $db = db_bind();
    $query = "update tbl_pages set title='$title',slug='$slug',content='$content',hidden='$hidden' where slug='$slug';";
    $db->query($query);
    $db->close();
}

function get_page($slug) {
    $db = db_bind();
    $query = "select * from tbl_pages where slug='$slug';";
    $storage=$db->query($query);
    $result=$storage->fetch_assoc();
    $db->close();
    return $result;
}
function get_pages() {
    $db = db_bind();
    $query = "select * from tbl_pages;";
    $storage=$db->query($query);
    $row=array();
    while ($result=$storage->fetch_assoc()) {
        $row[]=$result;
    }
    $db->close();
    return $row;
}

function page_exist($slug) {
    $db = db_bind();
    $query = "select * from tbl_pages where slug='$slug';";
    $storage=$db->query($query);
    $result=$storage->fetch_assoc();
    $db->close();
    if($result){
        return TRUE;
    }else{
        return FALSE;
    }
}

function delete_page($slug) {
    $db = db_bind();
    $query = "delete from tbl_pages where slug='$slug';";
    $db->query($query);
    $db->close();
}

function hidden_page($slug) {
    $db = db_bind();
    $query = "update tbl_pages set hidden=1 where slug='$slug';";
    $db->query($query);
    $db->close();
}
function show_page($slug) {
    $db = db_bind();
    $query = "update tbl_pages set hidden='0' where slug='$slug';";
    $db->query($query);
    $db->close();
}

    function view_pages_list(){
        $pages=get_pages();
        if($pages):
            $counter=1;
        ?>
    <table class="table table-striped table-info table-hover text-center table-bordered">
        <tr>
            <th style="width:10%;">ردیف</th>
            <th style="width:55%;">صفحه</th>
            <th style="width:35%;">ویرایش</th>
        </tr>
<?php
            foreach ($pages as $page=>$values){
         ?>
        <tr>
            <td><?php echo $counter;$counter++; ?></td>
            <td><?php echo $values['title'].'<br>'; echo base_url.$values['slug'];if($values['hidden']==1): ?>
                    <span class="badge badge-pill badge-danger">مخفی</span>
                <?php else: ?>
                    <span class="badge badge-pill badge-info">نمایان</span>
                <?php endif; ?>
            </td>
            <td>
                <a class="btn btn-danger" href="<?php echo base_url; ?>admin_page.php?action=delete&value=<?php echo $values['slug']; ?>">حذف</a>
                <?php if($values['hidden']==1): ?>
                    <a class="btn btn-success" href="<?php echo base_url; ?>admin_page.php?action=show&value=<?php echo $values['slug']; ?>">نمایش</a>
                <?php else: ?>
                    <a class="btn btn-warning" href="<?php echo base_url; ?>admin_page.php?action=hidden&value=<?php echo $values['slug']; ?>">مخفی</a>
                <?php endif; ?>
                <a class="btn btn-info" href="<?php echo base_url; ?>create_page.php?action=edit_page&value=<?php echo $values['slug']; ?>">ویرایش</a>
            </td>
        </tr>
        <?php } endif;?></table><?php
    }
    