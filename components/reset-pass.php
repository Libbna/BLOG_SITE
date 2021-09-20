<?php
require("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
</head>

<body>
    <?php include("../layouts/header.php"); ?>
    <?php
    $error = '';
    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
        $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error .= "Invalid email address";
        } else {
            $sql = $db->query("SELECT * FROM users WHERE email='" . $email . "'");
            $row = $sql->rowCount();
            if ($row == "") {
                $error .= "User Not Found";
            }
        }
        if ($error != "") {
            echo $error;
        } else {
            $output = '';

            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
            $expDate = date("Y-m-d H:i:s", $expFormat);
            $key = md5(time());
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;

            $db->query("INSERT INTO pwdreset (resetEmail, token, expDate) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "')");

            $output .= '<p>Please click on the following link to reset your password.</p>';
            //replace the site url
            $output .= '<p><a href="http://blogsite.com/components/create-new-pass.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://blogsite.com/components/create-new-pass.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
            $body = $output;
            $subject = "Password Recovery";

            $email_to = $email;


            require '../PHPMailerAutoload.php';

            $mail = new PHPMailer;

            // $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = useremail;                 // SMTP username
            $mail->Password = userpass;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(useremail, 'Libbna');
            $mail->addAddress($email_to);     // Add a recipient
            $mail->addReplyTo(useremail, 'Information');
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $body;
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
        }
    }
    ?>

    <section class="login-page py-5">
        <div class="container py-lg-5">
            <div class="real_info">
                <div class="reallogin_info">
                    <h2>Reset Your Password</h2>
                    <p>An email will be send to you with a link to reset your password. </p>
                    <form action="" method="POST" autocomplete="off" name="reset">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="email" name="email" placeholder="" required="">
                        </div>
                        <button class="btn btn-primary theme-button btn-login" name="reset-request-submit" type="submit">Reset</button>
                    </form>
                    <?php
                    if (isset($_GET["reset"])) {
                        if ($_GET["reset"] == "success") {
                            echo '<p class="signupsuccess">Check your email!</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <?php include("../layouts/footer.php"); ?>


</body>

</html>