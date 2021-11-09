<?php
require_once('./includes/config.php');
include("language.php");

if (!$user->is_logged_in()) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header('location: ../components/login');
}



if (isset($_POST['submit'])) {
    $profile_img = $_FILES['profile_img'];

    $filename =  $profile_img['name'];
    $filename_tmp =  $profile_img['tmp_name'];

    $profile_ext = explode('.',  $filename);
    $filecheck = strtolower(end($profile_ext));

    $file_ext_stored = array('jpeg', 'png', 'jpg');

    if (in_array($filecheck, $file_ext_stored)) {
        $destinationFile = '../assets/uploads/' . $filename;
        move_uploaded_file($filename_tmp, $destinationFile);
    }

    extract($_POST);
    if ($articleTitle == '') {
        $error[] = 'Please enter Title';
    }
    if ($articleDesc == '') {
        $error[] = 'Please enter Description';
    }
    if ($articleContent == '') {
        $error[] = 'Please enter Content';
    }
    if ($articleAuthor == '') {
        $error[] = 'Please enter Author Name';
    }



    if (!isset($error)) {
        try {
            // $stmt = $db->query("INSERT INTO article (articleTitle, articleDesc, articleContent, articleAuthor, profile_img) VALUES ('$articleTitle', '$articleDesc', '$articleContent', '$articleAuthor', '$destinationFile')");
            $stmt = $db->query("INSERT INTO article (langCode, langTitle, langDesc, langContent, author, profileImage) VALUES ('$language', '$articleTitle', '$articleDesc', '$articleContent', '$articleAuthor', '$destinationFile')");

            header('location:./admin/index.php?action=added');
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="message>' . $error . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Article</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
    <script src="/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php
    include("./layouts/header.php");
    ?>
    <section class="w3l-contact" id="contact">
        <div class="container py-5">
            <div class="contacts12-main py-md-3">
                <div class="header-section text-center">
                    <h3 class="mb-md-5 mb-4">Add Article
                    </h3>
                </div>
                <form action="" method="post" class="" enctype="multipart/form-data">
                    <div class="main-input">
                        <input type="text" name="articleTitle" class="contact-input" placeholder="Title" required="" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                                    echo $_POST['langTitle'];
                                                                                                                                                } ?>">
                        <textarea class="contact-textarea contact-input" name="articleDesc" placeholder="Description" required="" value="<?php if (isset($error)) {
                                                                                                                                                echo $_POST['langDesc'];
                                                                                                                                            } ?>"></textarea>
                        <textarea class="contact-textarea contact-input" id="content" name="articleContent" placeholder="Content" required="" value="<?php if (isset($error)) {
                                                                                                                                                            echo $_POST['langContent'];
                                                                                                                                                        } ?>"></textarea>
                        <input type="text" name="articleAuthor" placeholder="Author" class="contact-input mt-3" required="" autocomplete="off" value="<?php if (isset($error)) {
                                                                                                                                                            echo $_POST['articleAuthor'];
                                                                                                                                                        } ?>">
                        <input type="file" name="profile_img" class="contact-input" value="<?php echo $_POST['profileImage']; ?>">

                    </div>
                    <div class="text-right">
                        <button name="submit" class="btn-primary btn theme-button">+ Add</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include("./layouts/footer.php"); ?>

    <script>
        CKEDITOR.replace('content');
    </script>
    <script type="text/javascript">
        function set_lang() {
            var language = $('#language').val();
            window.location.href = '?language=' + language;
        }
    </script>

</body>

</html>