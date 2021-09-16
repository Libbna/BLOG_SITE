<?php
require_once('../includes/config.php');

// //loggedin or not
if (!$user->is_logged_in()) {
    header('Location: login.php');
} else {
    header('location: ../index.php');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
        <!-- Register -->
        <div class="container py-lg-3">
            <div class="real_info">
                <div class="reallogin_info">
                    <?php
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
                                header('Location:../components/login.php?action=added');
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

                    <h2>Sign up now</h2>
                    <p>Enter your details to Signup.</p>
                    <form action="" method="post" autocomplete="off">
                        <label>Username</label>
                        <div class="input-group">
                            <input name="username" type="text" placeholder="" required="" value="<?php if (isset($error)) {
                                                                                                        echo $_POST['username'];
                                                                                                    } ?>" autocomplete="off">
                        </div>
                        <label>Email</label>
                        <div class="input-group">
                            <input name="email" type="email" placeholder="" required="" value="<?php if (isset($error)) {
                                                                                                    echo $_POST['email'];
                                                                                                } ?>" autocomplete="off">
                        </div>
                        <label>Password</label>
                        <div class="input-group">
                            <input name="password" type="Password" placeholder="" required="" value="<?php if (isset($error)) {
                                                                                                            echo $_POST['password'];
                                                                                                        } ?>" autocomplete="new-password">
                        </div>
                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="remember-me"><i> </i> Remember me</label>
                        </div>
                        <button class="btn btn-primary theme-button btn-login" name="submit" type="submit">Signup</button>
                    </form>
                    <p class="account">By clicking Signup, you agree to our <a href="#terms">Terms &amp; Conditions!</a></p>
                    <p class="account1">Already Registered? <a href="../components/login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php include("../layouts/footer.php"); ?>



</body>

</html>