<?php
session_start();
include 'config/db.php';

$user_id = $_SESSION['user_id'];
$select = "SELECT title FROM blog WHERE `user_id`='$user_id'";
$query = mysqli_query($db,$select);
$arr = [];
while ($row = mysqli_fetch_assoc($query)){

    $arr[]= $row['title'];


}
echo json_encode($arr);die;

?>

