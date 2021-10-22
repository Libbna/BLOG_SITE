<?php require_once('./includes/config.php');
require('language.php');

if (!$user->is_logged_in()) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="/assets/sass/utilities/main.css">
</head>

<body>
    <?php include("./layouts/header.php") ?>
    <div class="container">

        <?php

        if (isset($_POST['submit'])) {

            //collect form data
            extract($_POST);

            //very basic validation
            if ($lang_id == '') {
                $error[] = 'This post is missing a valid id!.';
            }

            if ($langTitle == '') {
                $error[] = 'Please enter the title.';
            }

            if ($langDesc == '') {
                $error[] = 'Please enter the description.';
            }

            if ($langContent == '') {
                $error[] = 'Please enter the content.';
            }

            if (!isset($error)) {
                try {
                    //insert into database
                    $stmt = $db->query("UPDATE article SET langTitle = '$langTitle',  langDesc = '$langDesc', langContent = '$langContent' WHERE lang_id = '$lang_id'");

                  
                    header('Location: /admin/index.php?action=updated');
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        ?>
        <?php
        
        if (isset($error)) {
            foreach ($error as $error) {
                echo $error . '<br>';
            }
        }
        try {
            $stmt = $db->prepare('SELECT lang_id, langTitle, langDesc, langContent, profileImage FROM article WHERE lang_id = :lang_id');
            $stmt->execute(array(':lang_id' => $_GET['id']));
            $row = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        <section class="w3l-contact" id="contact">
            <div class="container py-5">
                <div class="contacts12-main py-md-3">
                    <div class="header-section text-center">
                        <h3 class="mb-md-5 mb-4">Update Article
                        </h3>
                    </div>
                    <form action="" method="post" class="" enctype="multipart/form-data">
                        <div class="main-input">
                            <input class="input" type='hidden' name='lang_id' autocomplete="off" value="<?php echo $row['lang_id']; ?>">
                            <input type="text" name="langTitle" class="contact-input" value="<?php echo $row['langTitle']; ?>">
                            <textarea class=" contact-textarea contact-input" name="langDesc"><?php echo $row['langDesc']; ?></textarea>
                            <textarea class="contact-textarea contact-input" name="langContent" value=""><?php echo $row['langContent']; ?></textarea>
                        </div>
                        <div class="text-right">
                            <button name="submit" class="btn-primary btn theme-button">^ Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>