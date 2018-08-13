<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

    <?php if(!isset($_SESSION['user_id'])){
      ?>
      <link rel="stylesheet" href="../css/style.css">
      <?php
  }  ?>

    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php">WebSiteName</a>
            </div>
            <?php if(isset($_SESSION['user_id'])){
                ?>
                <div class="collapse navbar-collapse " id="myNavbar">
                    <ul class="nav navbar-nav add_act ">
                        <li class="active"  ><a class="home" href="../profile.php">Profile</a></li>
                        <li><a class="home" href="gallery.php">Gallery</a></li>
                        <li><a class="home" href="blog.php">Blog</a></li>
                    </ul>
                    <div class="col-sm-4">
                        <form class="navbar-form navbar-left" action="../searchBlog.php" method="post">
                            <div class="input-group">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <ul class="nav navbar-nav navbar-right" >
                        <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                    </ul>
                </div>
            <?php } else{
                ?>
                <ul class="nav navbar-nav navbar-right" >
                    <li><a href="../index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                <?php

            } ?>
        </div>
    </nav>


<div class="container">