<?php
require_once("../includes/config.php");

$email = $_GET["email"];
$sql = $db->query("DELETE FROM subscribers WHERE semail = '$email'");
$sql->bindParam("s", $email);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe</title>
</head>

<body>
    <h3 class="">Your email, <?php echo $email; ?> has successfully unsubscribed from BlogIt</h3>
</body>

</html>