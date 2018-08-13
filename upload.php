<?php
session_start();
include 'config/db.php';
include 'function/function.php';
if(isset($_POST['submit'])) {
    $target_dir = "img/";
    $target_name = uniqid().basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $target_name;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $user_id = $_SESSION['user_id'];
            $data = [
                "avatar" => $target_name,
            ];

            $where = [
                "id" => $user_id,


            ];


            if (update('users', $data, $where)) {
                if (isset($_POST['current_image'])) {
                    $current_image = $_POST['current_image'];
                    if (file_exists($target_dir . $current_image)) {
                        unlink($target_dir . $current_image);
                    }
                }

                header('location:profile.php');
                die;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>