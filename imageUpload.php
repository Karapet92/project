<?php
session_start();
include 'config/db.php';
if(isset($_POST['submit'])) {
    foreach ($_FILES["fileToUpload"]["name"]  as $k => $v) {
        $target_dir = "gallery/";
        $target_name = uniqid() . basename($v);
        $target_file = $target_dir . $target_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($_FILES["fileToUpload"]["size"][$k]  > 500000) {
            $_SESSION['img_error'] = "Sorry, your file is too large.";
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $_SESSION['img_error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$k], $target_file)) {
            $user_id = $_SESSION['user_id'];
            $insert ="INSERT INTO `gallery` (`img_name`, `user_id`)
VALUES ('$target_name', '$user_id')";
            $query = mysqli_query($db, $insert);
            $_SESSION['img_error'] = '';

        } else {
            $_SESSION['img_error'] = "Sorry, there was an error uploading your file.";
        }

    }
    header('location:gallery.php');
    die;
}
