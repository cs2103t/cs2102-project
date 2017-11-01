<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "E-mail or Password is invalid";
        }
        else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=abc123");
            $result = pg_query($db, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
            $row    = pg_fetch_row($result);
            if ($row[0]) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['is_admin'] = $row[2];
                echo "Sign in succesful!";?>
                <script type="text/javascript">window.location = "http://localhost:8080/demo/mainpage.php"</script>;<?php
            }
    
            else {
                echo "E-mail or Password entered is incorrect.";
            }
        }
    }
?>
</body>
