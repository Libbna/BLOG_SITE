<?php
require_once('../includes/config.php');

// //loggedin or not
// if (!$user->is_logged_in()) {
//     header('Location: login.php');
// }
// 
include("../header.php");

?>

<title>Register</title>
<link href="/assets/style.css" rel="stylesheet" type="text/css">



<div class="content">
    <?php

    //if form has been submitted process it
    if (isset($_POST['submit'])) {

        //collect form data
        extract($_POST);

        //very basic validation
        if ($username == '') {
            $error[] = 'Please enter the username.';
        }

        if ($password == '') {
            $error[] = 'Please enter the password.';
        }

        if ($email == '') {
            $error[] = 'Please enter the email address.';
        }

        if (!isset($error)) {

            $hashedpassword = $user->create_hash($password);

            try {

                //insert into database
                $stmt = $db->prepare('INSERT INTO users (username,password,email) VALUES (:username, :password, :email)');
                $stmt->execute(array(
                    ':username' => $username,
                    ':password' => $hashedpassword,
                    ':email' => $email
                ));

                //redirect to user page 
                header('Location:login.php?action=added');
                exit;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    //check for any errors
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<p class="message">' . $error . '</p>';
        }
    }
    ?>
    <div class="container">
        <form action="" method="post" autocomplete="off">
            <h3 class="text-center text-info clr1">Register</h3>
            <div class="form-group">
                <label class="clr1">Username:</label><br>
                <input class="form-control" type="text" name="username" value="<?php if (isset($error)) {
                                                                                    echo $_POST['username'];
                                                                                } ?>" autocomplete="off">

            </div>
            <div class="form-group">
                <label class="clr1">Password:</label><br>
                <input class="form-control" id="password" type="password" name="password" value="<?php if (isset($error)) {
                                                                                                        echo $_POST['password'];
                                                                                                    } ?>" autocomplete="new-password">
            </div>

            <div class="form-group">
                <label class="clr1">Email:</label><br>
                <input class="form-control" id="email" type="text" name="email" value="<?php if (isset($error)) {
                                                                                            echo $_POST['email'];
                                                                                        } ?>" autocomplete="off">
            </div>

            <input type="submit" name="submit" class="btn btn-md btn-danger" value="Register">


    </div>





</div>

<script>

</script>