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
    if (isset($_POST['subscribe'])) {

        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp1.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'libbna260296@gmail.com';                 // SMTP username
        $mail->Password = 'kormaroti@@';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('libbna260296@gmail.com', 'Libbna');
        $mail->addAddress($_POST['email']);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('libbna260296@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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
                            <form role="form" method="post" enctype="multipart/form-data" class="rightside-form">
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

    <!-- <script>
        function doSubscribe() {
            var email = document.getElementById("email").value;

            var ajax = new XMLHttpRequest();
            ajax.open("POST", "/includes/do-subscribe.php", true);
            ajax.setRequestHeader(
                "Content-Type",
                "application/x-www-form-urlencoded"
            );
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("message").innerHTML = "Subscription Successful";
                }
            };

            ajax.send("email=" + email);

            return false;
        }
    </script> -->
</body>

</html>