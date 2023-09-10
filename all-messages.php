<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all-message.css">
</head>

<?php
$user = new User();

$messages = $user->getMessages();

?>
<div class="flex-container bg-primary ">
        <div class="item "><a href="skye8.tech" class="text-white">SKYE8</a></div>
        <div class="item ml-auto"><a href="#"><h4 style="color:white">
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
                <th class="px-4 py-2" style="width: 20%">Name</th>
                <th class="px-4 py-2" style="width: 30%">Email</th>
                <th class="px-4 py-2" style="width: 10%">Message </th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($messages as $message){
        ?>
        <tr>
            <td class="border py-2"> <?php echo $message['name'] ?></td>
            <td class="border py-2"> <?php echo $message['email'] ?></td>
            <td class="border py-2"> <?php echo $message['message'] ?></td>
           
        </tr>
        <?php }
        ?>
        
        
        <a class="btn btn-primary m-3" style="width: 200px" href="./dashboard.php">Dashboard</a>
</div>
</body>
</html> <?php }else{ header("Location: ./unauthorized.php"); } ?>
