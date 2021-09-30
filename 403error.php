<?php
$error = 403;

$err_title = "";
$err_msg = "";

if ($error == 403) {
    $err_title = "403 Forbidden";
    $err_msg = "You don't have permission to access / on this server.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="./assets/sass/utilities/main.css">

    <style>
        .error_content .fa-frown-o {
            font-size: 140px;
            color: #292922;
        }

        .error_content h2 {
            font-size: 83px;
            color: #292922;
            font-weight: 300;
            text-decoration: underline;
        }

        .error_content p {
            font-size: 18px;
            color: #696969;
            font-weight: 400;
            width: 80%;
            margin: 0 auto;
        }

        .theme-button {
            background-color: #f76a8c;
            border-color: #f76a8c;
            transition: 0.3s ease-out;
            display: inline-block;
            font-weight: 700;
            font-size: 16px;
            margin: 0px;
            border-radius: 6px;
            color: black;
        }

        .theme-button:hover {
            background-color: #f54670;
            border-color: #f54670;
            color: #fff;
        }
    </style>
</head>

<body>
    <section class="w3l-error py-5">
        <div class="container py-lg-3">
            <div class="error_content text-center">
                <span class="fa fa-frown-o"></span>
                <h2 class="mt-3"><?php echo $err_title; ?></h2>
                <p class="mt-3 mb-5"><?php echo $err_msg ?></p>
                <a href="../index" class="btn btn-primary theme-button py-3 px-4">Back to Home</a>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.js"></script>

</body>

</html>