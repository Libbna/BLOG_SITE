<?php
require_once('../includes/config.php');

//if user is not logged in
if (!$user->is_logged_in()) {
    header('location: login.php');
}

if (isset($_GET['delpost'])) {
    $stmt = $db->prepare('DELETE FROM article WHERE articleID=:articleID');
    $stmt->execute(array(':articleID' => $_GET['delpost']));
    header('location:index.php ? action=deleted');
    exit;
}
?>

<title> Admin Page </title>
<script type="text/javascript">
    function delpost(id, title) {
        if (confirm("Are you sure you want to delete '" + title + "'")) {
            window.location.href = 'index.php ? delpost=' + id;
        }
    }
</script>

<?php include("header.php"); ?>
<div class="content">
    <?php
    if (isset($_GET['action'])) {
        echo '<h3?>Post ' . $_GET['action'] . '.</h3>';
    }
    ?>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php
        try {
            $stmt = $db->query('SELECT articleID, articleTitle, articleDesc, articleAuthor FROM article ORDER BY articleID DESC');
            while ($row = $stmt->fetch()) {
                echo '<tr>';
                echo '<td>' . $row['articleTitle'] . '</td>';
                echo '<td>' . $row['articleAuthor'] . '</td>';
        ?>

                <td>
                    <button class="editbtn">
                        <a href="edit-blog-article.php?id = <?php echo $row['articleID']; ?>">Edit</a>
                    </button>
                </td>
                <td>
                    <button class="delbtn">
                        <a href="javascript:delpost('<?php echo $row['articleID']; ?>','<?php echo $row['articleTitle']; ?>')">Delete</a>
                    </button>
                </td>

        <?php
                echo '</tr>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        ?>
    </table>


    <p>
        <button class="editbtn">
            <a href="add-blog-article.php">Add New Article</a>
        </button>
    </p>
</div>