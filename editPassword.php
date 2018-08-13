
<?php
session_start();
include 'config/db.php';
$user_id= $_SESSION['user_id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password= $_POST['confirm_password'];

$select = "SELECT * FROM users WHERE `id`='$user_id'";
$query = mysqli_query($db,$select);


$row = mysqli_fetch_assoc($query);

    if (password_verify($old_password, $row['password'])) {

        if ($new_password == $confirm_password) {
            $new_password = crypt($new_password);
            $update = "UPDATE users SET password ='$new_password' WHERE `id`= '$user_id' ";
            $query = mysqli_query($db,$update);
            if($query){
                header('location:profile.php');
            }
        }
    }

?>
