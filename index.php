<?php
session_start();
include 'layout/header.php';
?>

    <form action="registerProcess.php" method="post" id="cms-signin">
    <!---heading---->
    <header class="heading"> Registration-Form</header><hr></hr>
    <!---Form starting---->
    <div class="row ">
        <!--- For Name---->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <span class="text-center" id="jsError"></span><!-- display client side errors -->
                    <label class="firstname">First Name :</label> </div>
                <div class="col-xs-8">
                    <input type="text" name="fname" required id="fname" value="<?php echo (isset($_SESSION['r_fname'])?  $_SESSION['r_fname'] : '');  ?>" placeholder="Enter your First Name" class="form-control ">
               <?php if(isset($_SESSION['e_fname'])) { ?>
                   <div class="alert alert-danger">
                       <?php echo  $_SESSION['e_fname']; ?>
                   </div>
                <?php } unset($_SESSION['e_fname']); ?>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <label class="lastname">Last Name :</label></div>
                <div class ="col-xs-8">
                    <input type="text" name="lname" required id="lname" placeholder="Enter your Last Name" class="form-control last">
                </div>
            </div>
        </div>
        <!-----For email---->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <label class="mail" >Email :</label></div>
                <div class="col-xs-8"	>
                    <input type="email" name="email" required id="email"placeholder="Enter your email" class="form-control" >
                   <span id="error" style="color: white;"></span>
                    <?php if(isset($_SESSION['e_email'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo  $_SESSION['e_email']; ?>
                        </div>
                    <?php } unset($_SESSION['e_email']); ?>

                </div>
            </div>
        </div>
        <!-----For Password and confirm password---->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <label class="pass">Password :</label></div>
                <div class="col-xs-8">
                    <input type="password" name="password" required id="password" placeholder="Enter your Password" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <label class="pass">Confirm Pass:</label></div>
                <div class="col-xs-8 mar">
                    <input type="password" name="password2" required id="password2" placeholder="Enter your Password again" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-4">
                    <label class="pass">Date of Birth:</label></div>
                <div class="col-xs-8 mar">
                    <input type="date" name="date" required class="form-control">
                </div>
            </div>
        </div>
        <!-----------For Phone number-------->
        <div class="col-sm-12">
            <div class ="row">
                <div class="col-xs-4 ">
                    <label class="gender">Gender:</label>
                </div>

                <div class="col-xs-4 male">
                    <input type="radio" required  name="gender"  id="gender" value="MALE">Male</input>
                </div>

                <div class="col-xs-4 female">
                    <input type="radio" required  name="gender" id="gender1" value="FEMALE" >Female</input>
                </div>

            </div>
            <div class="col-sm-12">
                <input type="submit" class="btn btn-warning" name="submit" value="Register">
                <a class="btn btn-warning" href="login.php">Login</a>
            </div>
        </div>
    </div>
    </form>

<?php

include 'layout/footer.php';

