<?php require_once('./includes/config.php');

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
            if ($articleID == '') {
                $error[] = 'This post is missing a valid id!.';
            }

            if ($articleTitle == '') {
                $error[] = 'Please enter the title.';
            }

            if ($articleDesc == '') {
                $error[] = 'Please enter the description.';
            }

            if ($articleContent == '') {
                $error[] = 'Please enter the content.';
            }

            if (!isset($error)) {
                try {
                    //insert into database
                    $stmt = $db->prepare('UPDATE article SET articleTitle = :articleTitle,  articleDesc = :articleDesc, articleContent = :articleContent =  WHERE articleID= :articleID');
                    $stmt->execute(array(
                        ':articleTitle' => $articleTitle,
                        ':articleDesc' => $articleDesc,
                        ':articleContent' => $articleContent,
                        ':articleID' => $articleID,


                    ));

                    //redirect to index page
                    header('Location: index.php?action=updated');
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        ?>
        <?php
        //check for any errors
        if (isset($error)) {
            foreach ($error as $error) {
                echo $error . '<br>';
            }
        }
        try {
            $stmt = $db->prepare('SELECT articleID, articleTitle, articleDesc, articleContent, profile_img FROM article WHERE articleID = :articleID');
            $stmt->execute(array(':articleID' => $_GET['id']));
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
                            <input class="input" type='hidden' name='articleID' autocomplete="off" value="<?php echo $row['articleID']; ?>">
                            <input type="text" name="articleTitle" class="contact-input" value="<?php echo $row['articleTitle']; ?>">
                            <textarea class=" contact-textarea contact-input" name="articleDesc"><?php echo $row['articleDesc']; ?></textarea>
                            <textarea class="contact-textarea contact-input" name="articleContent" value=""><?php echo $row['articleContent']; ?></textarea>
                        </div>
                        <div class="text-right">
                            <button name="submit" class="btn-primary btn theme-button">^ Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>