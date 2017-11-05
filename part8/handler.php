<!DOCTYPE html>
<html>
    <header>
    <title> Group12 Crowdfunding </title>
    </header>
<?php
    include "sign_in.php";
    session_start();
    $is_admin=$_SESSION['is_admin'];
    $override=$_SESSION['override'];
  
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    // each variable to be displayed
    // when user select a project that exist
    if (isset($_POST['update'])) {	// Submit the update SQL command
    session_start();
    $result = pg_query($db, "SELECT * FROM account WHERE account_email = '$_SESSION[email]' AND account_password = '$_POST[password2]' ");
    $row    = pg_fetch_assoc($result);
    if ($row|| $is_admin == 'T'){
        if($is_admin !='T'){
    $query ="UPDATE project SET 
	description = '$_POST[description]',
	created = '$_POST[created]' ,
	project_start = '$_POST[project_start]',
	project_end = '$_POST[project_end]',
	target = '$_POST[target]',
	completed = '$_POST[completed]' ,
	bankinfo = '$_POST[bankinfo]',
    picture_url = '$_POST[picture_url]' WHERE creator ='$_SESSION[override]' AND project_name= '$_SESSION[project_name]' " ;
        }
        else{
            $dummy=$_SESSION['dummy'];
            $dum =$_POST[raised] - $dummy;
            $proj_name=$_SESSION['project_name'];
            $sql = "INSERT INTO invest VALUES('dummygp12',
            '$_SESSION[project_name]','$_SESSION[override]',
            '$dum') ";
            $result1 = pg_query($db,$sql);
            $query ="UPDATE project SET 
    project_name= '$_POST[project_name]' ,
	description = '$_POST[description]',
	created = '$_POST[created]' ,
    raised = '$_POST[raised]',
	project_start = '$_POST[project_start]',
	project_end = '$_POST[project_end]',
	target = '$_POST[target]',
	completed = '$_POST[completed]' ,
	bankinfo = '$_POST[bankinfo]',
    picture_url = '$_POST[picture_url]' WHERE creator ='$_SESSION[override]' AND project_name= '$_SESSION[project_name]' " ;
        }
    $result = pg_query($db, $query );
        if (!$result ) {
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
        $result = pg_query($db,$q1); //find bank account
            $query = "INSERT INTO invest VALUES('$email',
            '$title','$creator',
            '$_POST[funds]') ";
            $result = pg_query($db,$query);
            if (!$result) {
                echo "donate failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            } 
            else {
                $sql = "UPDATE project SET raised = (SELECT SUM(amount) FROM invest WHERE creator ='$creator' AND project_name= '$title' ) WHERE creator ='$creator' AND project_name= '$title' ";
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
	
    ?> 
</html>