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
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $user_type;
                echo "Sign in succesful!";
                if($user_type ==='T') {
                    <script type="text/javascript">window.location = "http://localhost:8080/demo/mainpage.php"</script>;<?php
                }
                else {?>
<script type="text/javascript">window.location = "http://localhost:8080/demo/mainpage.php"</script>; <?php
                }
            }
    
            else {
                echo "E-mail or Password entered is incorrect.";
            }
        }
    }
?>
</body>
