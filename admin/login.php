<?php
require_once('../includes/config.php');
if ($user->is_logged_in()) {
    header('location:index.php');
}


include("../header.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/assets/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <title>Admin Login</title>

</head>

<body>
    <div class="content">
        <?php
        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $checkbox = isset($_POST['remember-me']);

            if ($user->login($username, $password)) {
                $_SESSION['username'] = $username;

                if ($checkbox == "on") {
                    setcookie("username", $username, time() + 3600);
                }
                header('location: index.php');
                exit;
            } else {
                $message = '<p class="invalid">Invalid username or password</p>';
            }
        }

        if (isset($message)) {
            echo $message;
        }
        ?>

        <div class="container">
            <form action="" method="post" autocomplete="off">
                <h3 class="text-center text-info clr1">Login</h3>
                <div class="form-group">
                    <label class="clr1">Username:</label><br>
                    <input class="form-control" type="text" name="username" value="">

                </div>
                <div class="form-group">
                    <label class="clr1">Password:</label><br>
                    <input id="password" class="form-control" type="password" name="password" value="">
                    <span id="eye"><i class="fa fa-eye" aria-hidden="true" onclick="toggle()"></i></span>
                </div>
                <div class="form-group">
                    <label for="remember-me" class="clr1"><span>Remember me</span>
                        <input type="checkbox" id="remember-me" name="remember-me">
                    </label><br>
                    <input type="submit" name="submit" class="btn btn-danger btn-md" value="submit">
                </div>
                <div id="register-link" class="text-right">
                    <a href="http://blogsite.com/admin/register.php" class="text-info">Don't Have an Account?</a>
                </div>


        </div>

    </div>

    <script src="/assets/app.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>