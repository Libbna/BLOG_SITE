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
<link href="http://localhost/blog/assets/style.css" rel="stylesheet" type="text/css">


<div class="content">


    <h2>Register</h2>

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

    <form action="" method="post">

        <p><label>Username</label><br>
            <input type="text" name="username" value="<?php if (isset($error)) {
                                                            echo $_POST['username'];
                                                        } ?>">
        </p>

        <p><label>Password</label><br>
            <input type="password" name="password" value="<?php if (isset($error)) {
                                                                echo $_POST['password'];
                                                            } ?>">
        </p>

        <p><label>Email</label><br>
            <input type="text" name="email" value="<?php if (isset($error)) {
                                                        echo $_POST['email'];
                                                    } ?>">
        </p>

        <button name="submit" class="subbtn">Register</button>




</div>