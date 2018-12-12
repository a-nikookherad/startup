<?php
    function get_title(){
        echo 'sign in page';
    }
    
    function get_content(){
//        echo '<PRE>';
//        var_export($_SESSION);
//        echo '<br>';
//        echo '</PRE>';
        if(isset($_POST['username']) && isset($_POST['password'])){
        $username= input_filter($_POST['username']);
        $password= input_filter($_POST['password']);
        user_login($username, $password);
        }
?>
    <form method="POST" class=" mt-3">
        <table class="tabla table-danger tabel-strip table-hover mx-auto rounded "  style="width:100%;">
            <tr >
                <td>نام کاربری:</td>
                <td><input type="text" class="form-control" name="username"></td>
            </tr>
            <tr>
                <td>کلمه عبور:</td>
                <td><input type="text" class="form-control" name="password"></td>
            </tr>
            <tr>
                <td><input type="reset" class="form-control btn btn-danger" value="reset"></td>
                <td><input type="submit" class="form-control btn btn-success" value="log in"></td>
            </tr>
        </table>
    </form>
<?php        
    }