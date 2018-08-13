<?php
include  'layout/header.php';
include 'config/db.php';
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $select = "SELECT * FROM `users` WHERE email='$email'";
    $query = mysqli_query($db,$select);

    $num = mysqli_num_rows($query);
    if($num){
        $a = range(0,9);
        $b = range('a','z');
        $c = range("A","Z");
        $d = array_merge($a,$b,$c);

        shuffle($d);
        $r = implode($d);
        $password = substr($r,5,10);
        if(mail( "$email", 'Your new password', "$password")){
            $new_password = crypt($password);
            $update = "UPDATE users SET password ='$new_password' WHERE email='$email' ";
            $query = mysqli_query($db,$update);
            if($query) {
                header('location:login.php');
                die;
            }
        }

    }
    else{
        header('location:index.php');
        die;
    }


}

?>

    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Login</h2>
                <p>Please enter your email</p>
            </div>
            <form id="Login" method="post" action="">

                <div class="form-group">
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email Address">

                </div>

                <input type="submit" class="btn btn-primary  btn-warning" name="login" value="Get Password">
                <a href="index.php" class="btn btn-primary  btn-warning" style="margin-top: 4px;">Registration </a>
            </form>
        </div>

    </div>
<?php
include  'layout/footer.php';
