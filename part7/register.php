<!DOCTYPE html>
<head>
<title>Register account </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>

<body>
<div id="main">
<?php
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        $checkusername = pg_query($db, "SELECT * FROM users WHERE email = '$email'");
        $row = pg_fetch_row($checkusername);
        
        if($row[0])
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, that E-mail is taken. Please go back and try again.</p>";
        }
        else
        {   
            if(isset($_POST['submit'])){
            $registerquery = pg_query($db, "INSERT INTO account VALUES ('$_POST[name]','$_POST[email]', '$_POST[password]' ,'F')");
            $success = pg_query($db, "SELECT * FROM account WHERE account_email = '$email' ");
            $srow = pg_fetch_row($success);
            if($srow[0])
            {   
                echo "<h1>Registration successful</h1>";
                echo "<p>Your account was successfully created. Please <a href=\"login2-css.php\">click here to login</a>.</p>";
            }
            else
            {   
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your registration failed. Please try again.</p>";
            }
        }
        }
    }
    
else {
    ?>
    <li> Please enter your details to register </li>
    <ul>
    <form name = "insert", action = "register.php", method = "POST">
    <li>E-mail:</li>
    <li><input type = "text" name = "email"></li>
    <li>Name:</li>
    <li><input type = "text" name = "name"></li>
    <li>Password:</li>
    <li><input type = "password" name = "password"></li>
    <li><input type = "submit" name = "submit"></li>
    </form>
    </ul>
    <?php
}
?>
</div>
</body>
<html>

