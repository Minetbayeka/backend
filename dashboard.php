 <!DOCTYPE html>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include './Connection.php';
include './Blog.php';
include './User.php';

$post = new Blog();
$user = new User();

if (!isset($_SESSION['username'])) {
    // get the ip address of the user
    $ip = $_SERVER['REMOTE_ADDR'];
    // get the user agent of the user
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    // get the current time
    $time = date("Y-m-d H:i:s");
    // get the current page
    $page = $_SERVER['PHP_SELF'];
    header("Location: ./unauthorized?ip=$ip&user_agent=$user_agent&time=$time");

}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->

    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="css/dashboard.css">
     <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand" href="#">SKYE8</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if ($_SESSION) { ?>
                        <li class="nav-item">
                            <span class="navbar-text text-white">
                                Welcome,
                                <?php echo $_SESSION['username']; ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline" action="./useraction.php" method="post">
                                <button type="submit" name="logout-submit" class="btn btn-danger ml-2">Logout</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>


    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success">
            <span>
                <?php echo $_GET['success']; ?>
            </span>
        </div>
    <?php } ?>


    <!-- design dashboard -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h2>
                            <?php echo count($user->getAllUsers()); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Posts</div>
                    <a class="card-body" href="all-posts.php">
                        <h2>
                            <?php echo count($post->getAllPosts()) ?: 'No posts found'; ?>
                        </h2>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Messages</div>
                    <a class="card-body" href="all-messages.php">
                        <h2>
                            <?php echo count($user->getMessages()); ?>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <a class="btn btn-primary mx-3" href="https://SKYE8.tech">Go To Website</a>
            <a class="btn btn-primary mx-3" href="./addblog.php">Add Blog</a>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>