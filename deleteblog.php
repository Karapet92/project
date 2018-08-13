<?php
session_start();
include 'config/db.php';
include 'function/function.php';
$user_id = $_SESSION['user_id'];

if(isset($_GET['img_id']) && isset($_GET['img_name'])){
    $img_id = $_GET['img_id'];
    $img_name = $_GET['img_name'];
    if (delete("blog",[
    "id"=>$img_id,
        "user_id" => $user_id])) {
        header("Location:blog.php");
    }
//    $delete = "DELETE FROM `blog` WHERE   `id`='$img_id' AND `user_id`='$user_id'";
//
//    $query = mysqli_query($db,$delete);
    if(file_exists('blog/'.$img_name)){
        unlink('blog/'.$img_name);

        if($query){
            header('location:blog.php');
        }
    } else{
        header('location:blog.php');die;

    }


}
else{
    header('location:blog.php');die;
}