   <?php
  	// Connect to the database. Please change the password in the following line accordingly
    $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
    $result = pg_query($db, "SELECT * FROM projects where email = '$_POST[email]'");	// Query template
    $row    = pg_fetch_assoc($result);		// To store the result row
    
    if (isset($_POST['search'])) { 
        if ($user == $var1 ) {?>
        <script type="text/javascript">window.location = "http://localhost/demo/profile_page.php"</script>
        <?php } 
        else {?>
        <script type="text/javascript">window.location = "http://localhost/demo/profilepage_notuser.php"</script>
        <?php }
    }
?>