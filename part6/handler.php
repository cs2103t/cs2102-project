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
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
    else{
        echo "wrong password";
    }
    }
    if (isset($_POST['donate'])) {
        session_start();
        $email=$_SESSION['email'];
        $q1 = "SELECT * from invest WHERE project_name ='$_POST[project_name]' AND creator = '$_POST[creator]' 
        AND account_email ='$email' ";
        $result = pg_query($db,$q1); //find bank account
        $row   = pg_fetch_assoc($result) ;
        $donation = $row[amount] + $_POST[funds];
        if ($row){ // means he donated before
            $query = "UPDATE invest SET amount = '$donation'
            WHERE account_email ='$email'AND project_name ='$_POST[project_name]' AND creator = '$_POST[creator]'  "; 
            $result = pg_query($db,$query);
            if (!$result) {
                echo "donate failed";
            } else {
                $sql = "UPDATE project SET raised ='$donation' WHERE creator ='$_POST[creator]' AND project_name= '$_POST[project_name]' ";
                $result2 = pg_query($db,$sql);
                if($result2){
                    echo "donate successful!";
                }
                else{
                    echo "donate failed";
                }
            }
        }
        else{
            session_start();
            $email=$_SESSION['email'];
            $query = "INSERT INTO invest VALUES( '$email',
            '$_POST[project_name]','$_POST[creator]', '$_POST[time]'
            ,'$_POST[funds]') ";
            $result = pg_query($db,$query);
            if (!$result) {
                echo "donate failed";
            } 
            else {
                $sql = "UPDATE project SET raised ='$donation' WHERE creator ='$_POST[creator]' AND project_name= '$_POST[project_name]' ";
                $result2 = pg_query($db,$sql);
                if($result2){
                    echo "donate successful!";
                }
                else{
                    echo "donate failed";
                }
            }
            
        }
	}
    ?> 