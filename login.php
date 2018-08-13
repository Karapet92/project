<?php
include  'layout/header.php';
?>

    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Login</h2>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" method="post" action="loginProcess.php">

                <div class="form-group">

                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email Address">

                </div>

                <div class="form-group">

                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

                </div>
                <div class="forgot">

                    <a href="forgot.php">Forgot password?</a>

                </div>


                <input type="submit" class="btn btn-primary  btn-warning" name="login" value="Login">
                <a href="index.php" class="btn btn-primary  btn-warning" style="margin-top: 12px;">Registration </a>
            </form>
        </div>

    </div>
<?php
include  'layout/footer.php';
