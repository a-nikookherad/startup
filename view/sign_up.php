<?php
    function get_title(){
        echo "sign up";
    }
    
    function get_content(){
        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])){
            $username= input_filter($_POST['username']);
            $password= input_filter($_POST['password']);
            $fname= input_filter($_POST['fname']);
            $lname= input_filter($_POST['lname']);
            $email= input_filter($_POST['email']);
//            $avatar= input_filter($_POST['avatar']);
//            echo '<pre>';
//            var_dump($_POST);            die();
//            if($email=email_filter($_POST['email'])){
            user_signup($username,$password,$fname,$lname,$email);
//            }else{
//                add_message('ایمیل شما معتبر نیست');
//            }
        }
        ?>
<form  method="POST" class="form mt-3" >
        <table class="tabla table-danger tabel-striped table-hover mx-auto rounded container">
            <tr>
                <td>نام کاربری:</td>
                <td><input type="text" class="form-control" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>"></td>
            </tr>
            <tr>
                <td>کلمه عبور:</td>
                <td><input type="text" class="form-control" name="password" ></td>
            </tr>
            <tr>
                <td>نام :</td>
                <td><input type="text" class="form-control" name="fname" value="<?php if(isset($_SESSION['fname'])) echo $_SESSION['fname']; ?>"></td>
            </tr>
            <tr>
                <td>نام خانوادگی :</td>
                <td><input type="text" class="form-control" name="lname" value="<?php if(isset($_SESSION['lname'])) echo $_SESSION['lname']; ?>"></td>
            </tr>
            <tr>
                <td>ایمیل:</td>
                <td><input type="text" class="form-control" name="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>"></td>
            </tr>
<!--            <tr>
                <td>عکس:</td>
                <td><input type="file" class="form-control" name="avatar" value="<?php// if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>"></td>
            </tr>-->
            <tr>
                <td><input type="reset" class="form-control btn btn-danger" value="reset"></td>
                <td><input type="submit" class="form-control btn btn-success" value="sign up"></td>
            </tr>
        </table>
    </form>
<?php
    }