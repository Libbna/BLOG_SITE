<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
</head>

<body>
    <?php include("../components/header.php"); ?>

    <section class="w3l-breadcrumb py-5">
        <div class="container">
            <h6 class="sub-title">Get in touch</h6>
            <div class="header-section">
                <h3>Contact Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime optio nam id quibusdam laborum sunt?</p>
            </div>
        </div>
    </section>
    <div style="margin: 8px auto; display: block; text-align:center;">
        <!---728x90--->
    </div>
    <section class="w3l-contact" id="contact">
        <div class="container py-5">
            <div class="contacts12-main py-md-3">
                <div class="header-section text-center">
                    <h3 class="mb-md-5 mb-4">Fill out the form.
                    </h3>
                </div>
                <form action="https://sendmail.w3layouts.com/submitForm" method="post" class="">
                    <div class="main-input">
                        <input type="text" name="w3lName" placeholder="Enter your name" class="contact-input" required="">
                        <input type="email" name="w3lSender" placeholder="Enter your mail" class="contact-input" required="">
                        <input type="email" name="w3lSubject" placeholder="Subject" class="contact-input">
                        <textarea class="contact-textarea contact-input" name="w3lMessage" placeholder="Enter your message" required=""></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn-primary btn theme-button">Send</button>
                    </div>
                </form>
            </div>
        </div>

        <div style="margin: 8px auto; display: block; text-align:center;">
            <!---728x90--->
        </div>

        <div class="contant11-top-bg py-5">
            <div class="container py-lg-3">
                <div class="d-grid contact section-gap">
                    <div class="contact-info-left d-grid">
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-location-arrow" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Address:</h4>
                                <p>Lorem dolor sit, New York, USA</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Phone:</h4>
                                <p><a href="tel:+598-658-456">+598-658-456</a></p>
                                <p><a href="tel:+598-658-457">+598-658-457</a></p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-envelope-open-o" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Mail:</h4>
                                <p><a href="mailto:mail@example.com" class="email">info@publication.com</a></p>
                                <p><a href="mailto:mail@example.com" class="email">publication@support.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 8px auto; display: block; text-align:center;">
            <!---728x90--->
        </div>

    </section>






    <?php include("../components/footer.php"); ?>

</body>

</html>