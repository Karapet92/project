<?php
include 'config/db.php';
include 'function/function.php';
session_start();
$user_id = $_SESSION['user_id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$data = [
    "name" => $firstname,
   "last_name"=> $lastname,

];

$where = [
    "id" => $user_id,

];

update('users', $data, $where);


//$update = "UPDATE `users` SET name='$firstname',last_name='$lastname' WHERE `id`='$user_id'";
//$query = mysqli_query($db,$update);

$select = "SELECT * FROM `users` WHERE `id`='$user_id'";
$query = mysqli_query($db,$select);
$row = mysqli_fetch_assoc($query);

$arr = [
    'name'=>$row['name'],
    'lastname'=>$row['last_name']
];
echo json_encode($arr);die;

