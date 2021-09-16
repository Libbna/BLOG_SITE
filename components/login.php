<?php
require_once('../includes/config.php');

// if user is already logged in, redirect to home/index page
if ($user->is_logged_in()) {
    header('location: ../index.php');
}
?>

<?php

$login = false;

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = $user->login($username, $password);
    if ($result) {
        try {
            $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
            $stmt->execute(array('username' => $username, 'password' => $password));
            $row = $stmt->fetch();

            while ($row) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                if ($row['role'] == "admin") {
                    if (isset($_SESSION['username'])) {

                        if ($checkbox == "on") {
                            setcookie("username", $username, time() + 3600);
                        }
                        header('location: /components/articles.php');
                        // header('/components/')
                        exit;
                    } else {
                        header("location: /components/articles.php");
                    }
                } elseif ($row['role'] == "user") {
                    if (isset($_SESSION['username'])) {
                        header('location: ../index.php');
                    }
                } else {
                    echo "Invalid username and password";
                }
            }
        } catch (PDOException $e) {
            echo "Error";
        }
    }
}









// if (isset($_POST['submit'])) {
//     $username = trim($_POST['username']);
//     $password = trim($_POST['password']);
//     $checkbox = isset($_POST['remember-me']);

//     if ($user->login($username, $password)) {
//         $_SESSION['username'] = $username;

//         if ($checkbox == "on") {
//             setcookie("username", $username, time() + 3600);
//         }
//         header('location: index.php');
//         exit;
//     } else {
//         $message = '<p class="invalid">Invalid username or password</p>';
//     }
// }

// if (isset($message)) {
//     echo $message;
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">



</head>

<body>
    <?php include("../layouts/header.php"); ?>

    <div style="margin: 8px auto; display: block; text-align:center;">
        <!---728x90--->
    </div>

    <section class="login-page py-5">
        <div class="container py-lg-5">
            <div class="real_info">
                <div class="reallogin_info">
                    <h2>Login to your Account</h2>
                    <p>Enter your details to login.</p>
                    <form action="" method="POST" autocomplete="off">
                        <label>Username</label>
                        <div class="input-group">
                            <input type="text" name="username" placeholder="" required="">
                        </div>
                        <label>Password</label>
                        <div class="input-group">
                            <input id="password" type="password" name="password" placeholder="" required="">
                            <span id="eye"><i class="fa fa-eye" aria-hidden="true" onclick="toggle()"></i></span>
                        </div>
                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="remember-me"> Remember me</label>
                        </div>
                        <button class="btn btn-primary theme-button btn-login" name="submit" type="submit">Login</button>
                    </form>
                    <p class="account1">Dont have an account? <a href="../components/register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </section>
    <?php include("../layouts/footer.php"); ?>


    <script src="/assets/js/app.js"></script>


</body>

</html>