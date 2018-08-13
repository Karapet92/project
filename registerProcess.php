<?php
session_start();
include 'config/db.php';

if(isset($_POST['submit'])){
    $password2 = $_POST['password2'];
    if(isset($_POST['fname']) && !empty($_POST['fname'])){
        $fname = $_POST['fname'];
        $_SESSION['r_fname'] =  $fname;
    } else{

        $_SESSION['e_fname'] = 'Firstname is missing';
        header('location:index.php');die;
    }

    if(isset($_POST['lname']) && !empty($_POST['lname'])){
        $lname = $_POST['lname'];
    } else{

        $_SESSION['e_lname'] = 'Lastname is missing';
        header('location:index.php');die;
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['e_email'] = "$email is not a valid email address";
            header('location:index.php');die;
        }
        $select = "SELECT email FROM `users` WHERE email='$email'";
        $query = mysqli_query($db, $select);
        $row = mysqli_num_rows($query);
        if($row){
            $_SESSION['e_email'] = "Email already used!";
            header('location:index.php');die;
        }

    } else{

        $_SESSION['e_email'] = 'Email is missing';
        header('location:index.php');die;
    }



    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password  = $_POST['password'];
    } else{

        $_SESSION['e_password'] = 'Password is missing';
        header('location:index.php');die;
    }
    if(isset($_POST['date']) && !empty($_POST['date'])){
        $date  = $_POST['date'];
    } else{

        $_SESSION['e_date'] = 'Date is missing';
        header('location:index.php');die;
    }

    if(isset($_POST['gender']) && !empty($_POST['gender'])){
        $gender  = $_POST['gender'];
    } else{

        $_SESSION['e_gender'] = 'Gender is missing';
        header('location:index.php');die;
    }




    if($password != $password2){
        $_SESSION['pass'] = "Passwords doesn't match";
        header('location:index.php');die;
    }
    else{
        $password = crypt($password);
        $insert ="INSERT INTO `users` (`name`, `last_name`, `email`, `password`, `date`, `gender`)
VALUES ('$fname', '$lname', '$email', '$password', '$date', '$gender')";
        $query = mysqli_query($db, $insert);
        if($query){
            $_SESSION['ok'] = " User Created Successfully";
            header('location:login.php');die;
        } else{
            header('location:index.php');die;
        }


    }

}


