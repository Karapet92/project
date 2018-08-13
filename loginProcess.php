<?php
session_start();
include 'config/db.php';
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `users` WHERE email='$email'";
    $query = mysqli_query($db,$select);

    $num = mysqli_num_rows($query);
    if($num){
        $row = mysqli_fetch_assoc($query);
        if(password_verify($password,$row['password'])){

            $_SESSION['user_id'] = $row['id'];
            header('location:profile.php?name='.$row['name']);die;
        } else{

            header('location:login.php');die;
        }

    } else{
        header('location:login.php');die;
    }


    }

