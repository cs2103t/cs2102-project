<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    $result = pg_query($db, "SELECT * FROM projects where email = '$_POST[email]'");	// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    // each variable to be displayed
    if (isset($_POST['project'])){ // when user select a project that exist
    $user = $_POST[user]; // the user in email
    $var1= $_POST[var1]; // the email
    $var2= $_POST[var1]; // the title
    $title1 = $row[var2];
    $description1 =$row[description];
    $email1 =$row[var1];
    $start_date1=$row[start_date];
    $end_date1=$row[end_date];
    $funding_needed1 =$row[funding_needed];
    }
    if (isset($_POST['submit'])) {	// Submit the update SQL command
        $result = pg_query($db, "UPDATE projects SET  
	title = '$_POST[title]', 
	description = '$_POST[description]',
    email = '$_POST[email]',
	start_date = '$_POST[start_date]',
	end_date = '$_POST[end_date]',
	funding_needed = '$_POST[funding_needed]'");
        if (!$result) {
            echo "Update failed!!";
        } else {
            echo "Update successful!";
        }
    }
    if (isset($_POST['create'])) {
		$query = "INSERT INTO projects VALUES ( '$_POST[title]','$_POST[description]',  
		'$_POST[email]','$_POST[start_date]','$_POST[end_date]' ,'$_POST[funding_needed]')";
		$result = pg_query($db,$query);
		if (!$result) {
            $test ='$_POST[title]';
            echo "welcome".test;
        } else {
            echo "create successful!";
        }
	}
    if (isset($_POST['donate'])) {
        $q1 = "SELECT bank From records WHERE title ='$_POST[title]' AND email = '$_POST[email]'";
        $result = pg_query($db,$q1); //find bank account
		$query = "UPDATE projects SET  title = '$_POST[title]', 
        email = '$_POST[email]', bank = '$q1', funds_raised = '$_POST[funds]'";
		$result = pg_query($db,$query);
		if (!$result) {
            echo "donate failed";
        } else {
            echo "donate successful!";
        }
	}
    ?> 