<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    $result = pg_query($db, "SELECT * FROM project where email = '$_POST[email]'");	// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    if (isset($_POST['create'])) {
		$query = "INSERT INTO project VALUES ( '$_POST[project_name]', '$_POST[creator]','$_POST[raised]', 
		'$_POST[target]',  '$_POST[created]',
		,'$_POST[project_start]','$_POST[project_end]' , '$_POST[completed]','$_POST[description]',
		'$_POST[bankinfo]')";
		$result = pg_query($db,$query);
		if (!$result) {
            $test ='$_POST[title]';
            echo "welcome".test;
        } else {
            echo "create successful!";
        }
	}
?>