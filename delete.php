<?php
session_start();
include 'config/db.php';
$user_id = $_SESSION['user_id'];

if(isset($_GET['img_id']) && isset($_GET['img_name'])){
    $img_id = $_GET['img_id'];
    $img_name = $_GET['img_name'];
    $delete = "DELETE FROM `gallery` WHERE   `id`='$img_id' AND `user_id`='$user_id'";

    $query = mysqli_query($db,$delete);
    if(file_exists('gallery/'.$img_name)){
        unlink('gallery/'.$img_name);

        if($query){
            header('location:gallery.php');
        }
    } else{
        header('location:gallery.php');die;

    }


}
else{
    header('location:gallery.php');die;
}