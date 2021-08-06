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

    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <title>Admin Login</title>
</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if ($user->login($username, $password)) {
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
    <form action="" method="post" class="form">
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" value="" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="" required>

            <p><a href="http://localhost/blog/admin/register.php">New User?</a></p>

            <button type="submit" name="submit">SignIn</button>
    </form>

</body>

</html>