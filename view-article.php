<?php
require_once('./includes/config.php');
require('language.php');


// if (!$user->is_logged_in()) {
//     header('location: login.php');
// };

// $stmt = $db->prepare('SELECT articleID, articleTitle, articleDesc, articleContent, articleAuthor FROM article WHERE articleID = :articleID');
$stmt = $db->prepare('SELECT * FROM article WHERE lang_id = :lang_id');
$stmt->execute(array(':lang_id' => $_GET['id']));
$row = $stmt->fetch();

?>

<title>
    <?php echo $row['langTitle']; ?> Article View
</title>

<head>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="./assets/style.css">

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">
</head>

<meta name="description" content="<?php echo $row['langDesc']; ?>">
<meta name="keywords" content="Article Keywords">

<?php include("./layouts/header.php"); ?>

<div class="container mt-5">
    <div class="container__title">
        <h1><?php echo $row['langTitle']; ?></h1>
    </div>
    <div class="container__body">
        <blockquote class="blockquote mb-0">
            <h2><?php echo $row['langDesc']; ?></h2>
            <h3><?php echo $row['langContent']; ?></h3>
            <footer class="blockquote-footer">
                <?php echo $row['author']; ?>
            </footer>
        </blockquote>
    </div>
</div>

<?php include("./layouts/footer.php"); ?>