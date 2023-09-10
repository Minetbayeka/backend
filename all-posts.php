<?php
session_start();
if(isset($_SESSION['username'])){

include './Connection.php';
include './Blog.php';
include './User.php';

$post = new Blog();
$user = new User();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
     
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body style="background:white;">
<?php

$blogpost = new Blog();
$user = new User();

$posts = $blogpost->getAllPosts();

?>
<div class="flex-container bg-primary">
        <div class="item"><a href="https://www.SKYE8.org" style="font-weight:700; color:white;">SKYE8</a></div>
        <div class="item ml-auto"><a href="#"><h4 style="color:white; font-weight:700;">
                <?php 
                if($_SESSION){
                    echo "Hi " . $_SESSION['username'];
                }
                ?>
            </h4></a></div>
</div>
<div class="container mt-5">
<div class="">
    <?php  if(isset($_GET['success'])){ ?>
    <span class="alert alert-success">
        <?php 
            echo $_GET['success'];
            unset($_GET['success']);
            ?>
        
        </sapn>
    </span>
    <?php } ?>
    
    <?php  if(isset($_GET['error'])){ ?>
    <span class="alert alert-danger">
        <?php 
            echo $_GET['error'];
            unset($_GET['error']);
            ?>
        
        </sapn>
    </span>
    <?php } ?>
</div>
<table class="table table-striped">
        <thead >
            <tr>
                <th class="px-4 py-2" style="width: 20%">Title</th>
                <th class="px-4 py-2" style="width: 30%">Body</th>
                <th class="px-4 py-2" style="width: 15%">Created On</th>
                <th class="px-4 py-2" style="width: 10%">Created By</th>
                <th class="px-4 py-2" style="width: 25%">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($posts as $post){
        ?>
        <tr>
            <td class="border py-2"> <?php echo $post['title'] ?></td>
            <td class="border py-2"> <?php echo $post['content'] ?></td>
            <td class="border py-2"> <?php echo $post['date'] ?></td>
            <td class="border  py-2"> 
            <?php 
                $user = $blogpost->getUser($post['userid']);
                echo $user['username'];
            ?>
            </td>
            <td class="border  py-2">
                
            <div class="row">
                <form class="col-md-6">
                    <a class="btn btn-info w-100 " href="./edit-blog.php?id=<?php echo $post['slug'] ?>">Edit</a> 
                </form>
                

            
                <form action="./useraction.php" method="post" class="col-md-6">
                    <input type="hidden" value="<?php echo $post['postid'] ?>" name="id">
                    <button class="btn btn-danger w-100" name="blog-delete">Delete</button>
                </form>
            </div>
            
            </td>
        </tr>
        <?php }
        ?>
        
        
        <a class="btn btn-primary m-3" style="width: 200px" href="./addblog.php">Add Blog</a>
</div>
</body>
</html> <?php }else{ header("Location: ./unauthorized.php"); } ?>
