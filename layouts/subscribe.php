<?php
require_once("./includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
</head>

<body>

    <?php
    if (isset($_GET['subscribe'])) {

        $email = $_GET['email'];

        $sql = $db->query("INSERT INTO subscribers (semail) VALUES ('$email')");

        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = useremail;                       // SMTP username
        $mail->Password = userpass;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(useremail, 'Libbna');
        $mail->addAddress($_GET['email']);                   // Add a recipient
        $mail->addReplyTo(useremail, 'Information');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Newsletter Subscription';
        $mail->Body = '<p>Hello there — thank you for signing up!</p>' .
            '<p>To unsubscribe <a href = "http://blogsite.com/layouts/unsubscribe.php?email=' . $email . '">Unscubscribe</a></p>';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
    ?>

    <section class="w3l-subscribe">
        <div class="main-w3 py-5">
            <div class="container py-lg-3">
                <div class="grids-forms text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="fa fa-envelope mb-3" aria-hidden="true"></span>
                            <div class="header-section text-center">
                                <h3>Keep up to date - Get Email updates</h3>
                                <p>Get our latest news straight into your inbox</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-md-5 mt-4">
                        <div class="col-lg-7 col-md-9 mx-auto main-midd-2">
                            <form action="#" role="form" method="GET" enctype="multipart/form-data" class="rightside-form">
                                <input id="email" type="email" name="email" placeholder="Input your e-mail" required="">
                                <button type="submit" name="subscribe" class="btn btn-primary theme-button">Subscribe</button>
                            </form>
                            <p id="message"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

</body>

</html>