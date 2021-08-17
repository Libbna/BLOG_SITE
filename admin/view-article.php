<?php
require_once('../includes/config.php');

if (!$user->is_logged_in()) {
    header('location: login.php');
};

// $stmt = $db->prepare('SELECT articleID, articleTitle, articleDesc, articleContent, articleAuthor FROM article WHERE articleID = :articleID');
$stmt = $db->prepare('SELECT * FROM article WHERE articleID = :articleID');
$stmt->execute(array(':articleID' => $_GET['id']));
$row = $stmt->fetch();

?>

<title>
    <?php echo $row['articleTitle']; ?> Article View
</title>

<head>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="./assets/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



</head>

<meta name="description" content="<?php echo $row['articleDesc']; ?>">
<meta name="keywords" content="Article Keywords">

<?php include("header.php"); ?>

<div class="container mt-5">
    <div class="container__title">
        <h1><?php echo $row['articleTitle']; ?></h1>
    </div>
    <div class="container__body">
        <blockquote class="blockquote mb-0">
            <h2><?php echo $row['articleDesc']; ?></h2>
            <h3><?php echo $row['articleContent']; ?></h3>
            <footer class="blockquote-footer">
                <?php echo $row['articleAuthor']; ?>
            </footer>
        </blockquote>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>