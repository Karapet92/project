<?php
session_start();
include'config/db.php';
$user_id = $_SESSION['user_id'];
if(isset($_POST["add_gallery"])){
    if(isset($_FILES["file_gallery"])==false)
    {
        echo "<b>Please, Select the files to upload!!!</b>";
        return;
    }

    foreach($_FILES["file_gallery"]["tmp_name"] as $key=>$tmp_name)
    {
            //var_dump($_FILES["file_gallery"]["tmp_name"]);
        $uploadThisFile = true;

        $file_name=uniqid().basename($_FILES["file_gallery"]["name"][$key]);
        $file_tmp=$tmp_name;

        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        // Check file size
        if ($_FILES["file_gallery"]["size"][$key] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadThisFile = false;
        }
        if ($ext != "jpg" && $ext != "png" && $ext != "jpeg"
            && $ext != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadThisFile = false;

        }



        if($uploadThisFile){
            //$filename=uniqid().basename($file_name);
            $newFileName="gallery/".$file_name;
            move_uploaded_file($_FILES["file_gallery"]["tmp_name"][$key],$newFileName);

            $insert = "INSERT INTO `gallery` (`user_id`, `img_name`) VALUES('$user_id','$file_name')";
            $query = mysqli_query($db, $insert);
            if($query){
                header('location:gallery.php');
            }

        }



    }

}






?>