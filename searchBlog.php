<?php
session_start();
include 'config/db.php';
include 'layout/header.php';
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
$user_id=$_SESSION['user_id'];
if(isset($_POST['search']) && !empty($_POST['search'])){
    $post=$_POST['search'];

    $select ="SELECT * FROM `blog`   WHERE `user_id`='$user_id' AND `title` LIKE '%$post%' ORDER BY id DESC";
    $query = mysqli_query($db,$select);

    if (mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_assoc($query)){
            $url = $row["image_name"];

            ?>
            <div   id="<?php echo $row['id'];?>" class="col-sm-3">
                <h1 style="display:inline-block"><?php echo $row['title'];?></h1>
                <a data-fancybox="gallery"  href="<?php  echo "blog/".$url; ?>"><image src="<?php  echo "blog/".$url; ?>"  class="images img-responsive" /></a>
                <div class="text"> <?php echo substr($row['description'],0,120).'...'; ?></div>

                <a  class="btn btn-info readmore"   href="readmore.php?id=<?php echo $row['id'];?>" style="display: block">Read More</a>
            </div>
        <?php  }
    }


} else{

    header('location:blog.php');
}

include  'layout/footer.php';