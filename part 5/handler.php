<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    // each variable to be displayed
    // when user select a project that exist
    if (isset($_POST['update'])) {	// Submit the update SQL command
        $query ="UPDATE project SET 
	description = '$_POST[description]',
	created = '$_POST[created]' ,
	project_start = '$_POST[project_start]',
	project_end = '$_POST[project_end]',
	target = '$_POST[target]',
	raised = '$_POST[raised]' ,
	completed = '$_POST[completed]' ,
	bankinfo = '$_POST[bankinfo]'  WHERE creator ='$_POST[creator]'AND project_name= '$_POST[project_name]' " ;
        $result = pg_query($db, $query );
    if (!$result) {
        echo "Update failed!!";
    } else {
        echo "Update successful!";
    }
    }
    if (isset($_POST['donate'])) {
        $q1 = "SELECT bank From invest WHERE project_name ='$_POST[project_name]' AND account_email = '$_POST[account_email]'";
        $result = pg_query($db,$q1); //find bank account
	$query = "UPDATE invest SET amount = amount + '$_POST[funds]' ";
	$result = pg_query($db,$query);
		if (!$result) {
            echo "donate failed";
        } else {
            echo "donate successful!";
        }
	}
    ?> 