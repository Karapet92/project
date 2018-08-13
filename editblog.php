<?php
if(!empty($_POST['current_image'])) {
    if (file_exists('blog/' . $_POST['current_image'])) {
        unlink('blog/'.$_POST['current_image']);
    }
}

include 'config/db.php';
session_start();

    $user_id = $_SESSION['user_id'];
    $current_id = $_POST['current_id'];
    $firstname = $_POST['title'];
    $lastname = $_POST['description'];
    $im=$_POST['current_image'];
   // $img = $_FILES['img']['name'];
    $file_name = $_FILES['img']['name'];
    $newFileName="blog/".$file_name;
move_uploaded_file($_FILES["img"]["tmp_name"],$newFileName);


$update = "UPDATE `blog` SET title='$firstname',description='$lastname',image_name='$file_name' WHERE `user_id`='$user_id' AND `id`='$current_id'";
    $query = mysqli_query($db, $update);
    $select = "SELECT * FROM `blog` WHERE `id`='$current_id'";
    $query = mysqli_query($db,$select);
    $row = mysqli_fetch_assoc($query);

    $arr = [
        'title'=>$row['title'],
        'description'=>$row['description'],
        'img_name' =>$row['image_name']
    ];
    echo json_encode($arr);die;

