<?php
session_start();
include 'config/db.php';
include 'layout/header.php';
include 'function/function.php';
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
$user_id = $_SESSION['user_id'];
//$select = "SELECT * FROM `users` WHERE  id='$user_id'";
//$query = mysqli_query($db,$select);
//$row = mysqli_fetch_assoc($query);
$where = [
        'id'=>$user_id
];

$row = select('users',$where);

?>
<img src="<?php if ($row['avatar'] == NULL) {
    if ($row['gender'] == 'MALE') {
        echo 'img/male.jpg';
    } else {
        echo 'img/female.jpg';
    }
} else {
    echo 'img/' . $row['avatar'];
}
?>" />
    <h2><span id="f_name"><?php echo $row['name'];  ?></span> <span id="l_name"> <?php echo $row['last_name']; ?> </span></h2>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">Edit password</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="editProfile.php" method="post" id="edit">
                        <div class="form-group">
                            <label for="text">Name:</label>
                            <input type="text"  name="firstname" class="form-control" value="<?php echo $row['name']  ?>" id="text">
                        </div>
                        <div class="form-group">
                            <label for="text">Lastname:</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $row['last_name']  ?>" id="lastname">
                        </div>
                        <div class="modal-footer">
                            <input type="submit"  class="btn btn-default" value="edit" name="submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <form action="editPassword.php" method="post" id="edit_pasw">
                        <div class="form-group">
                            <label for="text">Old Password:</label>
                            <input type="password" name="old_password" class="form-control" value="" id="text1">
                        </div>
                        <div class="form-group">
                            <label for="text">New password:</label>
                            <input type="text" name="new_password" class="form-control" value="" id="n_pass">
                            <span id="error" style="color: white;"></span>

                        </div>
                        <div class="form-group">
                            <label for="text">Confirm password:</label>
                            <input type="text" name="confirm_password" class="form-control" value="" id="c_pass">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-default" value="change" name="change">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="current_image" value="<?php echo $row['avatar'];  ?>">
    <input type="submit" value="Upload Image" name="submit">

</form>


<?php

include 'layout/footer.php';
