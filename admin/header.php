<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/blog/assets/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<style>
    .navbar-default {
        background-color: #DE4839;
    }

    .navbar-default .navbar-brand {
        color: white;
        font-family: "Lucida Console", "Courier New", monospace;
    }

    .head {
        padding: 6px;
        color: white;
        font-size: 24px;
        font-family: "Lucida Console", "Courier New", monospace;
        border: 1px solid white;
    }

    .navbar-header {
        margin-top: 5px;
    }

    .navbar-default .navbar-nav>li>a {
        color: white;
        font-family: "Lucida Console", "Courier New", monospace;
        font-size: 18px;
    }

    .nav>li {
        position: relative;
        display: block;
        padding-left: 25px;
        padding-top: 5px;
    }
</style>

<body>
    <nav class=" navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <p class="head">BlogSite</p>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
</body>

</html>