<?php
session_start();
include 'config/db.php';
include('function/function.php');
$user_id = $_SESSION['user_id'];

if(isset($_POST['add_text'])) {
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $_SESSION['title'] = 'Title is missing';

    }
    if (isset($_POST['description']) && !empty($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        $_SESSION['descrioption'] = 'description is missing';

    }
    if($_FILES['file_blog']['name']){
        $target_dir = "blog/";
        $target_name = uniqid() . basename($_FILES["file_blog"]["name"]);
        $target_file = $target_dir . $target_name;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
            move_uploaded_file($_FILES["file_blog"]["tmp_name"], $target_file);
        }
    } else {

        $target_name = '5b63795d15c46img4.png';
    }

$arr = [
  'title'=> $title,
  //'image_name'=>$_FILES['file_blog']['name'],
    'description' => $description,
    'user_id'=>$user_id,
    'image_name' => $target_name,
];
    if ( insert('blog',$arr)) {
        header('Location:blog.php');
    }

//    $insert = "INSERT INTO `blog` (`user_id`, `title`, `image_name`, `description`)
//VALUES ('$user_id', '$title', '$target_name', '$description' ) ";
//    $query = mysqli_query($db, $insert);
//    if ($query) {
//        header('location:blog.php');
//    }




    }


?>
