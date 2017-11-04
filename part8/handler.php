<?php
    include "sign_in.php";
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    // each variable to be displayed
    // when user select a project that exist
    if (isset($_POST['update'])) {	// Submit the update SQL command
    session_start();
    $result = pg_query($db, "SELECT * FROM account WHERE account_email = '$_SESSION[email]' AND account_password = '$_POST[password2]' ");
    $row    = pg_fetch_row($result);
    if ($row[0]){
    $query ="UPDATE project SET 
	description = '$_POST[description]',
	created = '$_POST[created]' ,
	project_start = '$_POST[project_start]',
	project_end = '$_POST[project_end]',
	target = '$_POST[target]',
	raised = '$_POST[raised]' ,
	completed = '$_POST[completed]' ,
	bankinfo = '$_POST[bankinfo]',
    picture_url = '$_POST[picture_url]' WHERE creator ='$_SESSION[email]' AND project_name= '$_POST[project_name]' " ;
    $result = pg_query($db, $query );
        if (!$result) {
            echo "Update failed!!";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        } else {
            echo "Update successful!";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
    }
    else{
        echo "wrong password";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
    }
    }
    if (isset($_POST['donate'])) {
        session_start();
        $title=$_SESSION['title'];
        $creator=$_SESSION['creator'];
        $email =$_SESSION['email'];
        $q1 = "SELECT * from invest WHERE project_name ='$title' AND creator = '$creator' 
        AND account_email ='$email' ";
        $result = pg_query($db,$q1); //find bank account
        $row   = pg_fetch_assoc($result) ;
        $donation = $row[amount] + $_POST[funds];
        if ($row){ // means he donated before
            $query = "UPDATE invest SET amount = '$donation'
            WHERE account_email ='$email' AND project_name ='$title' AND creator = '$creator'  "; 
            $result = pg_query($db,$query);
            if (!$result) {
                echo "donate failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            } else {
                $sql = "UPDATE project SET raised ='$donation' WHERE creator ='$creator' AND project_name= '$title' ";
                $result2 = pg_query($db,$sql);
                if($result2){
                    echo "donate successful!";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
                }
                else{
                    echo "donate failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
                }
            }
        }
        else{
            $query = "INSERT INTO invest VALUES('$email',
            '$title','$creator',
            '$_POST[funds]') ";
            $result = pg_query($db,$query);
            if (!$result) {
                echo "donate failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            } 
            else {
                $sql = "UPDATE project SET raised ='$donation' WHERE creator ='$creator' AND project_name= '$title' ";
                $result2 = pg_query($db,$sql);
                if($result2){
                    echo "donate successful!";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
                }
                else{
                    echo "donate failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
                }
            }
            
        }
	}
    ?> 