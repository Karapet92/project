<?php
include 'config/db.php';

if(isset($_POST['a'])){
    $email = $_POST['a'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $select = "SELECT email FROM `users` WHERE email='$email'";
        $query = mysqli_query($db, $select);
        $row = mysqli_num_rows($query);
        if($row){
            $error = [
                'error'=>'Email already used!'
            ];

        }
    }
     elseif (empty($_POST['a'])){

         $error = [
             'error'=>"Email is missing"
         ];
     }

    else{

        $error = [
            'error'=>"$email is not a valid email address"
        ];
    }

}
echo json_encode($error);


