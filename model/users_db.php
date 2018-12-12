<?php
//user data base table
function create_user($username, $password, $fname, $lname, $email) {
    if (exist_user($username)) {
        update_user($username, $password, $fname, $lname, $email);
    } else {
        insert_user($username, $password, $fname, $lname, $email);
    }
}

function insert_user($username, $password, $fname, $lname, $email) {
    $db = db_bind();
    $query = "insert into tbl_users(userid,username,password,fname,lname,email)values(NULL,?,?,?,?,?);";
    $storage=$db->prepare($query);
    $storage->bind_param("sssss",$username, $password, $fname, $lname, $email);
    $storage->execute();
    $db->close();
}
function update_user($username, $password, $fname, $lname, $email) {
    $db = db_bind();
    $query = "update tbl_users set username=?,password=?,fname=?,lname=?,email=? where username=?;";
    $storage=$db->prepare($query);
    $storage->bind_param("ssssss", $username, $password, $fname, $lname, $email,$username);
    $storage->execute();
    $db->close();
}

function get_user($username) {
    $db = db_bind();
    $userid2=NULL;$username2=NULL;$password2=NULL;$fname2=NULL;$lname2=NULL; $email2=NULL;
    $query = "select * from tbl_users where username = ? ;";
    $storage=$db->prepare($query);
    $storage->bind_param("s", $username);
    $storage->execute();
    $storage->store_result();
    $storage->bind_result($userid2,$username2,$password2,$fname2,$lname2,$email2);
    $storage->fetch();
    $db->close();
    $result=array(
        'userid'=>$userid2,
        'username'=>$username2,
        'password'=>$password2,
        'fname'=>$fname2,
        'lname'=>$lname2,
        'email'=>$email2
    );
    return $result;
}

function get_users() {
    $db = db_bind();
    $query = "select * from tbl_users;";
    $storage=$db->query($query);
    $row=array();
    while ($result=$storage->fetch_assoc()){
        $row[]=$result;
    }
    $db->close();
    return $row;
}

function get_user_id($username) {
    $userid2=NULL;$username2=NULL;$password2=NULL;$fname2=NULL;$lname2=NULL; $email2=NULL;
    $db = db_bind();
    $query = "select userid from tbl_users where username=?;";
    $storage=$db->prepare($query);
    $storage->bind_param("s", $username);
    $storage->execute();
    $storage->store_result();
    $storage->bind_result($userid2,$username2,$password2,$fname2,$lname2,$email2);
    $storage->fetch();
    $db->close();
    return $userid2;
}

function exist_user($username) {
    $db = db_bind();
    $userid2=NULL;$username2=NULL;$password2=NULL;$fname2=NULL;$lname2=NULL; $email2=NULL;
    $query = "select * from tbl_users where username=? ;";
    $storage=$db->prepare($query);
    $storage->bind_param("s", $username);
    $storage->execute();
    $storage->store_result();
    $storage->bind_result($userid2,$username2,$password2,$fname2,$lname2,$email2);
    $storage->fetch();
    $db->close();
    if($username2){
        return TRUE;
    }else{
        return FALSE;
    }
    }
function exist_user2($username,$password){
        $db = db_bind();
        $userid2=NULL;$username2=NULL;$password2=NULL;$fname2=NULL;$lname2=NULL; $email2=NULL;
        $query = "select * from tbl_users where username=? AND password=?;";
        $storage=$db->prepare($query);
        $storage->bind_param("ss", $username,$password );
        $storage->execute();
        $storage->store_result();
        $storage->bind_result($userid2,$username2,$password2,$fname2,$lname2,$email2);
        $storage->fetch();
        $db->close();
        if(isset($username2) && isset($password2)){
            return TRUE;
        }else{
            return FALSE;
        }
}

function delete_user($username) {
    $db = db_bind();
    $query = "delete from tbl_users where username=?;";
    $storage=$db->prepare($query);
    $storage->bind_param("s", $username);
    $storage->execute();
    $db->close();
}

function view_users_list(){
    $users=get_users();
    if($users):
                ?>
    <table class="table table-striped table-info table-hover text-center table-bordered">
        <tr>
            <th style="width:10%;">ردیف</th>
            <th style="width:55%;">نام کاربری</th>
            <th style="width:35%;">ویرایش</th>
        </tr>
<?php
        $counter=1;
        foreach ($users as $values){
            if($values['username']=='admin'){continue;}
     ?>
    <tr>
        <td><?php echo $counter;$counter++; ?></td>
        <td><?php echo $values['username'].'<br>';?></td>
        <td>
            <a class="btn btn-danger" href="<?php echo base_url; ?>admin_page.php?action=user_delete&value=<?php echo $values['username']; ?>">حذف</a>
            <a class="btn btn-info" href="<?php echo base_url; ?>admin_page.php?action=user_edit&value=<?php echo $values['username']; ?>">ویرایش</a>
        </td>
    </tr>
    <?php } endif;?></table><?php    
}




function user_edit_info($input=NULL){
    if(isset($input)){
        $set_user=get_user($input);
    }
?>
<form  method="POST" class="form mt-3" >
        <table class="tabla table-danger tabel-striped table-hover mx-auto rounded container">
            <tr>
                <td>نام کاربری:</td>
                <td><input type="text" class="form-control" name="username" value="<?php if(isset($set_user['username'])) {echo $set_user['username'];} ?>"></td>
            </tr>
            <tr>
                <td>کلمه عبور:</td>
                <td><input type="text" class="form-control" name="password" ></td>
            </tr>
            <tr>
                <td>نام :</td>
                <td><input type="text" class="form-control" name="fname" value="<?php if(isset($set_user['fname'])) {echo $set_user['fname'];} ?>"></td>
            </tr>
            <tr>
                <td>نام خانوادگی :</td>
                <td><input type="text" class="form-control" name="lname" value="<?php if(isset($set_user['lname'])) {echo $set_user['lname'];} ?>"></td>
            </tr>
            <tr>
                <td>ایمیل:</td>
                <td><input type="text" class="form-control" name="email" value="<?php if(isset($set_user['email'])) {echo $set_user['email'];} ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="form-control btn btn-success" value="save edit"></td>
            </tr>
        </table>
</form>
<?php }