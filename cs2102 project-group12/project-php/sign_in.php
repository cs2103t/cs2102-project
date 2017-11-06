<!DOCTYPE html>
<html>
<header>
    <title> Group12 Crowdfunding </title>
    </header>
<body>
<?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "E-mail or Password is invalid";
        }
        else {
            require ('connect.php');
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = pg_query($db, "SELECT * FROM account WHERE account_email = '$email' AND account_password = '$password'");
            $row    = pg_fetch_assoc($result);
            if ($row) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['is_admin'] = $row['is_admin'];
                echo "Sign in succesful!";?>
                <script type="text/javascript">window.location.href = "mainpage.php"</script>;<?php
            }
    
            else {
                echo "E-mail or Password entered is incorrect.";
                echo "<br>";
                echo "<br>";
                echo "go to login page to try again <a href=\"index.php\">click here to login</a>.";
            }
        }
    }
?>
</body>
</html>