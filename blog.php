<?php
session_start();
include 'config/db.php';
include 'layout/header.php';

if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
$user_id=$_SESSION['user_id'];


?>
<form action="creat_blog.php" method="post" enctype="multipart/form-data" >
    Select image and text blog
    <input type="text" name="title" style="display:block;">
    <input type="file" name="file_blog" >
    <textarea name="description" id="" style="display: block" cols="20" rows="2"></textarea>
    <input type="submit" value="add" name="add_text">
</form>
<?php

$select1 ="SELECT * FROM `blog`   WHERE `user_id`='$user_id' ORDER BY id DESC ";
$query1= mysqli_query($db,$select1);

$num = mysqli_num_rows($query1);
$limit = 4;
$num_rows = ceil($num/$limit);
if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
}
else{
    $page_id = 1;
}

$offset = $limit*($page_id-1);


$select ="SELECT * FROM `blog` WHERE `user_id`='$user_id' ORDER BY id DESC LIMIT $limit  OFFSET $offset";
$query = mysqli_query($db,$select);


if (mysqli_num_rows($query)>0){
    while($row = mysqli_fetch_assoc($query)){
        $url = $row["image_name"];

        ?>
        <div   id="<?php echo $row['id'];?>" class="col-sm-3">
        <h1 style="display:inline-block"><?php echo $row['title'];?></h1>
            <a data-fancybox="gallery"  href="<?php  echo "blog/".$url; ?>"><image src="<?php  echo "blog/".$url; ?>"  class="images img-responsive" /></a>
       <div class="text"> <?php echo substr($row['description'],0,120).'...'; ?></div>

       <a  class="btn btn-info readmore"   href="readmore.php?id=<?php echo $row['id'];?>" style="display:inline-block">Read More</a>

        </div>
  <?php  }
} else{

   header('location:blog.php');
}

?>
<div class="col-xs-12">
    <ul class="pagination">
        <?php for ($i=1;$i<=$num_rows;$i++){  ?>
        <li><a class="page" data-pageId="<?php echo $i; ?>" href="#"><?php echo $i;  ?></a></li>
        <?php  } ?>
    </ul>
</div>
<?php
include 'layout/footer.php';