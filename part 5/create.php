<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    
    if (isset($_POST['create'])) {
		$query = "INSERT INTO project VALUES ( 
        '$_POST[project_name]', 
        '$_POST[creator]',
        '$_POST[raised]', 
		'$_POST[target]',
        '$_POST[created]',
		'$_POST[project_start]',
        '$_POST[project_end]', 
        'false', 
        '$_POST[description]',
		'$_POST[bankinfo]', 
        'http://www.indiantelevision.com/sites/drupal7.indiantelevision.co.in/files/images/internet-images/2016/04/25/Web-Series-Scripted.png')";
		$result = pg_query($db,$query);
		if (!$result) {
            
            echo "create failed !";
        } else {
            echo "create successful!";
        }
	}
?>