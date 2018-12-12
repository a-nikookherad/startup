<?php
allow_user_admin();
function get_title(){
    return 'edite_user';
}
function get_content(){
    if(isset($_GET['value'])&&isset($_GET['action'])){
        $set_user=get_user($_GET['value']);
    }
?>
<form  method="POST" class="form mt-3" >
        <table class="tabla table-danger tabel-striped table-hover mx-auto rounded container">
            <tr>
                <td>نام کاربری:</td>
                <td><input type="text" class="form-control" name="username" value="<?php if(isset($set_user['username'])) echo $set_user['username']; ?>"></td>
            </tr>
            <tr>
                <td>کلمه عبور:</td>
                <td><input type="text" class="form-control" name="password" ></td>
            </tr>
            <tr>
                <td>نام :</td>
                <td><input type="text" class="form-control" name="fname" value="<?php if(isset($set_user['fname'])) echo $set_user['fname']; ?>"></td>
            </tr>
            <tr>
                <td>نام خانوادگی :</td>
                <td><input type="text" class="form-control" name="lname" value="<?php if(isset($set_user['lname'])) echo $set_user['lname']; ?>"></td>
            </tr>
            <tr>
                <td>ایمیل:</td>
                <td><input type="text" class="form-control" name="email" value="<?php if(isset($set_user['email'])) echo $set_user['email']; ?>"></td>
            </tr>
            <tr>
                <td><input type="reset" class="form-control btn btn-danger" value="reset"></td>
                <td><input type="submit" class="form-control btn btn-success" value="sign up"></td>
            </tr>
        </table>
</form>
<?php }