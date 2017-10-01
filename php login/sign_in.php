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
            $user_type = $_POST['user_type'];
            $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=abc123");
            $result = pg_query($db, "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND  is_admin = '$user_type'");
            $row    = pg_fetch_row($result);
            if ($row[0]) {
                echo "Sign in succesful!";
                if($user_type ==='T') {
                    //<a href = 'admin_page.php'></a>
                    echo "You are a admin";
                }
                else {
                    //<a href = 'user_page.php'></a>
                    echo " You are a user";
                }
            }
    
            else {
                echo "E-mail or Password entered is incorrect.";
            }
        }
    }
?>
</body>
