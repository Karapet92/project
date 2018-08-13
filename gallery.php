<?php
session_start();
include 'layout/header.php';
include'config/db.php';
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
$user_id = $_SESSION['user_id'];
?>
    <form action="upload_gallery.php" method="post" enctype="multipart/form-data">
        Select image to gallery:
        <input type="file" name="file_gallery[]" id="file_gallery"  multiple>
        <input type="submit" value="Upload Image" name="add_gallery">

    </form>

<!--    <input type="text" name="current_image" value="--><?php //echo $row['img_name'];  ?><!--">-->
<div class="container">
    <div class="page-header">

    </div>
    <div class="panel panel-default">
        <div class="panel-body">
    <div class="row">
            <br/>
            <?php
            $query = "SELECT * FROM gallery WHERE `user_id`='$user_id'";
            $result  = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $url = $row["img_name"];
                    ?>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-info btn-sm navbar-right" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">x</button>

                        <!-- Modal -->
                        <div id="<?php echo $row['id'];?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="delete.php?img_id=<?php echo $row['id']; ?>&img_name=<?php echo $row['img_name'] ?>" class="btn btn-info" role="button">Yes</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a data-fancybox="gallery"  href="<?php  echo "gallery/".$url; ?>"><image src="<?php echo "gallery/".$url; ?>" class="images img-responsive" /></a>
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <p>There are no images uploaded to display.</p>
                <?php
            }
            ?>
    </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>

