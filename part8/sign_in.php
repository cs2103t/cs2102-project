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
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
            $result = pg_query($db, "SELECT * FROM account WHERE account_email = '$email' AND account_password = '$password'");
            $row    = pg_fetch_assoc($result);
            if ($row) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['is_admin'] = $row['is_admin'];
                echo "Sign in succesful!";?>
                <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
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