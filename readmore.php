<?php

session_start();
include 'config/db.php';
include 'layout/header.php';
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
$user_id = $_SESSION['user_id'];
if(isset($_GET['id'])) {
    $more_id = $_GET['id'];
    $select = "SELECT * FROM `blog` WHERE `user_id`='$user_id' AND `id`='$more_id' ";
    $query = mysqli_query($db, $select);
    $row = mysqli_fetch_assoc($query);
    if(!$row){
        header('location:blog.php');die;

    }
}

?>
<h1 id="tit" style="text-align: center"><?php echo $row['title']?></h1>
<div  style="text-align: center"><image id="im" src ="<?php echo "blog/".$row['image_name']?>" style="width: 300px; height: 300px"/></div>
<h3 id="desc"><?php echo $row['description'] ?></h3>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit</button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#a<?php echo $row['id'];?>">Delete</button>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="editblog.php" method="post" id="editt" enctype="multipart/form-data">
                        <input type="hidden" name="current_id" value="<?php echo $row['id']  ?>">
                        <a data-fancybox="gallery"  href="<?php $url=$row['image_name'];
                        echo "blog/".$url; ?>"><image id="img1" src="<?php  echo "blog/".$url; ?>"  class="images img-responsive" /></a>
                        <input type="file" name="img" id="galleryToUpload" value="<?php echo  $url; ?>" >
                        <input type="hidden" name="current_image" id="current_image" value="<?php echo $row['image_name'];   ?>">
                        <div class="form-group">
                            <label for="text">Title:</label>
                            <input type="text"  name="title" class="form-control" value="<?php echo $row['title']  ?>" id="text">
                        </div>
                        <div class="form-group">
                            <label for="text">Description:</label>
                            <textarea  name="description" class="form-control" id="description" cols="20" rows="2"><?php echo $row['description']  ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <input type="submit"  class="btn btn-default" value="edit" name="submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    </div>
    <div class="modal fade" id="a<?php echo $row['id'];?>" role="dialog">
        <div  class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-body">
                    <a href="deleteblog.php?img_id=<?php echo $row['id']; ?>&img_name=<?php echo $row['image_name'] ?>" class="btn btn-info" role="button">Yes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                </div>

            </div>

        </div>
    </div>


<?php
include 'layout/footer.php';