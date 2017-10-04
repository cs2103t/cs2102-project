<?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    $result = pg_query($db, "SELECT * FROM projects where email = '$_POST[var2]'");	// Query template
    $row    = pg_fetch_row($result);		// To store the result row
    // each variable to be displayed
    // when user select a project that exist
    if (isset($_POST['search'])) { 
        if ($user == $var1 ) {?>
        <script type="text/javascript">window.location = "http://localhost/demo/profile_page.php"</script>
        <?php } 
        else {?>
        <script type="text/javascript">window.location = "http://localhost/demo/profilepage_notuser.php"</script>
        <?php }
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
    if (isset($_POST['donate'])) {
        $q1 = "SELECT bank From records WHERE title ='$_POST[title]' AND email = '$_POST[email]'";
        $result = pg_query($db,$q1); //find bank account
		$query = "UPDATE records SET  title = '$_POST[title]', 
        $email = '$_POST[email]', bank = '$q1', funds_raised = '$_POST[funds]'";
		$result = pg_query($db,$query);
		if (!$result) {
            echo "donate failed";
        } else {
            echo "donate successful!";
        }
	}
    ?> 