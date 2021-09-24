<?php
require("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/sass/utilities/main.css">
</head>

<body>
    <?php include("../layouts/header.php"); ?>
    <?php
    $error = '';
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])  && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");

        $sql = $db->query("SELECT * FROM pwdreset WHERE token ='" . $key . "' and resetEmail='" . $email . "';");
        $row = $sql->rowCount();

        if ($row == '') {
            $error .= '<h2>Invalid Link</h2>';
        } else {
            $row = $sql->fetch();
            $expDate = $row['expDate'];

            if ($expDate >= $curDate) {
    ?>
                <section class="login-page py-5">
                    <div class="container py-lg-5">
                        <div class="real_info">
                            <div class="reallogin_info">

                                <form action="" method="POST" autocomplete="off" name="update">
                                    <input type="hidden" name="action" value="update">
                                    <label>New Password</label>
                                    <div class="input-group">
                                        <input type="password" name="pwd" required="" value="update">
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="pwd_confirm" required="" name="update">
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                    <button class="btn btn-primary theme-button btn-login" id="reset" name="reset-password-submit" type="submit">Reset Password</button>
                                </form>
                    <?php
                } else {
                    $error .= "<h2>Link Expired</h2>>";
                }
            }
            if ($error != "") {
                echo "<div class='error'>" . $error . "</div><br />";
            }
        }
        if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
            $error = '';
            $pwd = $_POST["pwd"];
            $pwd_confirm = $_POST["pwd_confirm"];
            $email = $_POST["email"];
            $curDate = date("Y-m-d H:i:s");
            if ($pwd != $pwd_confirm) {
                $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
            }
            if ($error != "") {
                echo $error;
            } else {
                $pwd = md5($pwd);
                $db->query("UPDATE users SET password = '" . $pwd . "' WHERE email = '" . $email . "'");
                $db->query("DELETE FROM pwdreset WHERE resetEmail ='" . $email . "'");

                echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
            }
        }
                    ?>
                            </div>
                        </div>
                    </div>
                </section>

                <?php include("../layouts/footer.php"); ?>
</body>

</html>