<?php
require_once("includes/config.php");

$stmt = $db->query('SELECT * FROM article');

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
<!-- Main CSS -->
<link rel="stylesheet" href="/assets/main.css">

<?php
// include("./header.php");

?>

<h1>Search Page</h1>

<div class="container">
    <?php
    if (isset($_GET['submit-search'])) {
        $search = $_GET['search'];
        // $search = mysqli_real_escape_string($db, $_POST['search']);  //escapes special characters in a string for use in an SQL query
        // $search = PDO::quote($db, $_POST['search']);

        // $result = $db->query("SELECT * FROM article WHERE articleTitle LIKE '%$search%' OR articleDesc LIKE '%$search%' OR articleContent LIKE '%$search%' 
        //         OR articleAuthor LIKE '%$search%'");
        $result = $db->query("SELECT * FROM article WHERE articleTitle LIKE '%" . $search . "%' OR articleDesc LIKE '%" . $search . "%' OR articleContent LIKE '%" . $search . "%' 
                OR articleAuthor LIKE '%" . $search . "%'");


        if ($result) {
            while ($row = $result->fetch()) {
                echo "<div class='container'>
                <h3>" . $row['articleTitle'] . "</h3>
                <h5>" . $row['articleDesc'] . "</h5>
                <p>" . $row['articleContent'] . "</p>
                <p>" . $row['articleAuthor'] . "</p>
                </div>";
            }
        } else {
            echo "There are no results matching your search!";
        }
    }
    ?>
</div>



<?php
// include('footer.php');
?>