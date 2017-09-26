<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    $result = pg_query($db, "SELECT * FROM projects where email = '$_POST[email]'");		// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
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
    ?> 