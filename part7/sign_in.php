<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST['submit'])) {
        echo $_POST;
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "E-mail or Password is invalid";
        }
        else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_type = $_POST['user_type'];
            $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
            $result = pg_query($db, "SELECT * FROM account WHERE account_email = '$email' AND account_password = '$password' AND  is_admin = '$user_type'");
            $row    = pg_fetch_row($result);
            if ($row[0]) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $user_type;
                echo "Sign in succesful!";?>
                <script type="text/javascript">window.location = "http://localhost/demo/part7/testing.php";</script><?php           
            }
    
            else {
                echo "E-mail or Password entered is incorrect.";
            }
        }
    }
?>
</body>
</html>
