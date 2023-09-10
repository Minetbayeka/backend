<!-- html login page -->
<?php 
session_start();
 if (isset($_SESSION['username'])) { 
    header("Location: dashboard");
} ?>

<!doctype html>
<html>

<head>
    <title>Login and Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php  if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <span class="error">
                                        <?php 
                                        $msg = $_GET['error'];
                                        echo str_replace("-", " ", $msg); 
                                        // clear error message after 5 seconds
                                        header("refresh:5;url=.");
                                         ?></span>
                                </div>
                                <?php } ?>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">Login or Register</h4>
                    </div>

                    <div class="row justify-content-center">
                        <div class="login-box" id="login">
                            <h2>Login</h2>
                            <form action="useraction" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn
                                        btn-primary" name="login-submit">Login</button>
                                <p class="mt-2">Don't have an account? <a href="#" class="toggle-form"
                                        data-form="register">Register</a></p>
                            </form>
                        </div>
                        <div class="register-box">
                            <h2>Register</h2>

                            <!-- show alert that user can't register -->
                            <div class="alert alert-danger hide" role="alert">
                                <form id="register-form" method="POST" class="disabled">
                                    <div class="alert alert-danger m-auto" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="bi
                                                bi-exclamation-triangle-fill" width="20" height="20"
                                            style="display:inline-block;vertical-align:middle;">
                                            <path d="M9.9 1.687L18.31
                                                    16.16a1.5 1.5 0 0 1-.131
                                                    1.864 1.5 1.5 0 0
                                                    1-1.697.41H3.518a1.5 1.5 0 0
                                                    1-1.697-.41 1.5 1.5 0 0
                                                    1-.131-1.864L9.1 1.687a1.5
                                                    1.5 0 0 1 2.8 0z"></path>
                                            <path d="M10.286 14.077a1.333
                                                    1.333 0 1 1-2.572 0 1.333
                                                    1.333 0 0 1 2.572
                                                    0zm-1.167-8a1.5 1.5 0 0 1
                                                    2.333 0l.75 1.5a.5.5 0 0
                                                    1-.417.75h-3a.5.5 0 0
                                                    1-.417-.75l.75-1.5z"></path>
                                        </svg>
                                        <div class="m-2">
                                            <strong>Sorry!</strong>
                                            Registration is currently
                                            disabled.
                                            <p class="mt-2">Please contact
                                                the administrator.</p>
                                        </div>
                                    </div>
                                    <!-- login link -->
                                    <div class="text-center">
                                        <a href="#login" class="toggle-form" data-form="login">Login</a>
                                    </div>
                                </form>
                            </div>
                            <!-- <form>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
              <p class="mt-2">Already have an account? <a href="#" class="toggle-form" data-form="login">Login</a></p>
            </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('.toggle-form').click(function () {
                        var form = $(this).data('form');
                        $('.login-box, .register-box').hide();
                        $('.' + form + '-box').show();
                    });
                });

            </script>
</body>

</html>
