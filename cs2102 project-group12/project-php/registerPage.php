<!DOCTYPE html>
<html >
<header>
    <title> Group12 Crowdfunding </title>
    </header>
<head>
  <meta charset="UTF-8">
  <title>Sign up form</title>
  <link rel="stylesheet" href="registerStyle.css">

  
</head>

<body>
<div id="main">
<?php
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        require ('connect.php');
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
                echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
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
  <ul>
  <form name = "insert", action = "registerPage.php", method = "POST">
  <h1>Sign up</h1><br/>
  <span class="input"></span>
  <input type="text" name="name" placeholder="Full name"  />
  <span class="input"></span>
  <input type="email" name="email" placeholder="Email address" required />
  <span id="passwordMeter"></span>
  <input type="password" name="password" id="password" placeholder="Password" title="Password min 8 characters. At least one UPPERCASE and one lowercase letter" required pattern="(?=^.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"/>
  <button type="submit" name="submit" value="Sign Up" title="Submit form" class="icon-arrow-right"><span>Sign up</span></button>
  </form>
  </ul>

    <?php
}
?>
</div>
</body>
</html>
