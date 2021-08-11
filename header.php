<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://localhost/blog/assets/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <title>Document</title>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#toggle").click(function() {
                $('span').toggleClass('active')
            })
        })
    </script> -->

</head>


<body>
    <nav class="navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <p class="head">BlogSite</p>
            </div>

            <div id="toggle">
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <span id="bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span id="cross"><i class="fa fa-times" aria-hidden="true"></i></span>
                </a>
            </div>
            <!-- navbar_nav == menu -->
            <ul class="nav navbar-nav" id="navbar-nav">
                <li><a href="http://localhost/blog/">Home</a></li>
                <li><a href="http://localhost/blog/admin/login.php">Login</a></li>
                <li><a href="http://localhost/blog/admin/register.php">Register</a></li>
            </ul>
        </div>
    </nav>

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("navbar-nav");
            var cross = document.getElementById("cross");
            var bar = document.getElementById("bar");
            if (x.style.display === "block") {
                x.style.display = "none";
                bar.style.display = "block";
                cross.style.display = "none"

            } else {
                x.style.display = "block";
                bar.style.display = "none";
                cross.style.display = "block"
            }
        }
    </script>
</body>


</html>