<?php
require_once('../includes/config.php');
include("../language.php");


//if user is not logged in
if ($user->is_logged_in()) {
    if ($_SESSION['role'] == "user") {
        header('Location: ../components/login');
    }
} else if (!$user->is_logged_in()) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header('Location: ../components/login');
}

?>

<script type="text/javascript">
    function delpost(id, title) {
        if (confirm("Are you sure you want to delete '" + title + "'")) {
            window.location.href = 'index.php ? delpost=' + id;
        }
    }
</script>

<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "added") { ?>
        <div class="alert alert-success" role="alert">
            Article has been added successfuly!
        </div>

    <?php } ?>
<?php } ?>

<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "deleted") { ?>
        <div class="alert alert-danger" role="alert">
            Article has been deleted successfuly!
        </div>

    <?php } ?>
<?php } ?>
<?php if (isset($_REQUEST['action'])) { ?>
    <?php if ($_REQUEST['action'] == "updated") { ?>
        <div class="alert alert-primary" role="alert">
            Article has been updated successfuly!
        </div>

    <?php } ?>
<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
    <title>Dashboard</title>
</head>

<body>
    <?php include("../layouts/header.php"); ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>
                <th scope="col">Profile</th>
                <th scope="col">Edit/Delt/View</th>
            </tr>
        </thead>

        <?php

        try {
            $stmt = $db->query("SELECT * FROM article WHERE langCode = '$language' ORDER BY lang_id  DESC");
            while ($row = $stmt->fetch()) {
        ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $row['langTitle']; ?></th>
                        <td><?php echo $row['langDesc']; ?></td>
                        <td><?php echo $row['author'] ?></td>
                        <td><img src="<?php echo $row['profileImage'] ?>" alt="" height="100px" width="100px"></td>
                        <td>
                            <div id="mybtn" class="btn-group btn-group-md">
                                <?php
                                echo '<a type="button" class="btn btn-success" id="edit" href="../edit-blog-article/' . $row['lang_id'] . '"><i class="fa fa-edit"></i></a>';
                                ?>

                                </a>
                                <a id="trash" type="button" class="btn btn-danger" role="button" href="javascript:delpost('<?php echo $row['lang_id']; ?>','<?php echo $row['langTitle']; ?>')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php
                                echo '<a type="button" class="btn btn-info" href="../view-article/' . $row['lang_id'] . '"><i class="fa fa-eye"></i></a>';
                                ?>

                            </div>
                        </td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
            <?php
            echo '</tr>';
            echo '</tbody>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

            ?>
    </table>
    <?php
    if (isset($language) && ($language == 'en')) {
    ?>
        <div class="add_view_btn ml-4">
            <a id="add" class="btn btn-success" role="button" href="../add-blog-article">Add Article</a>
            <a id="add_banner" class="btn btn-primary" role="button" href="add_view-banner">Add / View Banner</a>
        </div>
    <?php
    } else {
    ?>
        <div class="add_view_btn ml-4">
            <a id="add" class="btn btn-success" role="button" href="../add-blog-article"><?php echo $terms[$language][2]; ?></a>
            <a id="add_banner" class="btn btn-primary" role="button" href="add_view-banner"><?php echo $terms[$language][3]; ?></a>
        </div>
    <?php
    }
    ?>


    <?php include("../layouts/footer.php"); ?>



</body>

</html>