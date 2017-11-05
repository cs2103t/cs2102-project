<!DOCTYPE html>
<html>
    <header>
    <title> Group12 Crowdfunding </title>
    </header>
<?php
    include 'sign_in.php';
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
    if (isset($_POST['create'])) {
        session_start();
		$query = "INSERT INTO project VALUES ( 
        '$_POST[project_name]', 
        '$_SESSION[email]',
        '0', 
		'$_POST[target]',
        '$_POST[created]',
		'$_POST[project_start]',
        '$_POST[project_end]', 
        'not completed', 
        '$_POST[description]',
		'$_POST[bankinfo]', 
        'http://tempusfilms.com/wp-content/uploads/2014/04/facebook_no_photo.jpg')";
		$result = pg_query($db,$query);
		if (!$result) {
            echo "create failed !";
            echo "<br>";
            echo "you may have created a project with the same title";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        } else {
            echo "create successful!";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        
	}
?>
</html>