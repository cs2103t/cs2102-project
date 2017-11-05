<!DOCTYPE html>
<html>
<header>
    <title> Group12 Crowdfunding </title>
    </header>
<head>
<meta charset="utf-8">
<title>Project Crowdfunding Main Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="mainpage.css" rel="stylesheet" type="text/css">
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<div id="mainWrapper">
<!-- Header Content -->
  <header> 
    <!-- This is the header content. It contains Logo and User profile -->
    <div id="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
      <!-- Company Logo text --> 
      Crowdfunding </div>
	<!-- user info -->
    <div id="headerText"> Welcome back, <?php session_start(); echo $_SESSION['email']; ?> </div>
	<!-- logout button -->
	<div id="headerLinks"><a href="index.php"> Logout </a></div>
  </header>

  <section id="offer"> 
    <!-- Banner -->
    <h2>View Projects</h2>
  </section>
  

  
  <div id="content">
  <section class="sidebar">
  
    <form method ="post" action= "mainpage.php" >
	  <?php session_start();
			$page_l=$_SESSION['pagel']; // page lower limit
	  ?>
    <label>Project Title: </label>
	<input type ="text" name ="titl" id ="var1">
	<br />
	<br />
    <input type="submit" id = "search" name ="search" value ="search">
    </form>
	<br />
	<br />
    <form method ="post" action="createprofile.php">
        <label>Create new project?</label>
		<br />
		<br />
        <input type="submit" id = "search" name="redirect" value = "create new project" >
    </form>
	<br />
	<br />
      <form method =post action=deletion.php>
      <?php
      session_start();
      $is_admin=$_SESSION['is_admin'];
      if($is_admin=='T'){
      echo "
        <label>User: </label>
        <input type =text name=user_d >
		<br />
		<br />
        <input type=submit id = search name=reset value =reset password>
        <input type=submit id = search name=delete_u value =delete user>";
      }
      ?>
      <br />
      <br />
        <label>Change password</label>
		<br />
		<br />
        <input type="password" name="old" id="search" placeholder="Old Password"/>
        <input type="password" name="new" id="search" placeholder="New Password" title="Password min 8 characters. At least one UPPERCASE and one lowercase letter" required pattern="(?=^.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"/>
        <input type="password" name="cfm" id="search" placeholder="confirm New Password" title="Password min 8 characters. At least one UPPERCASE and one lowercase letter" required pattern="(?=^.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"/>
        <input type="submit" id = "search" name="change" value = "change password" >
    </form>
      
    
  </section>
  
  <section class="mainContent">
	  <form method ="post" action= "mainpage.php" >
		  <?php session_start();
				$page_l=$_SESSION['pagel']; // page lower limit
		  ?>
	  <input type="hidden" name="prev10_v" value = <?php session_start(); echo $page_l; ?>>
	  <input type="submit" id = "prevButton" name="prev10" value ="Previous Page" style = "float: left">
	  <input type="submit" id = "nextButton" name="next10" value ="Next Page" style = "float: right">
	  </form>

<br />
<br />
<br />
<br />
  
<?php
// Create connection
include 'sign_in.php';
session_start();
$email=$_SESSION['email'];
$is_admin=$_SESSION['is_admin'];
$_SESSION['pagel']=$page_l;
$page_l=$_SESSION['pagel'];
$db = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
if(empty($page_l)){
    $page_l=0;
}
if (isset($_POST['next10'])){
    $page_l +=10;
    $_SESSION['pagel']= $page_l;
}
if (isset($_POST['prev10'])){
    $page_l -=10;
    if($page_l <=0){
        $page_l=0;
    }
    $_SESSION['pagel']= $page_l;
}
if (isset($_POST['search'])){
    if (empty($_POST['titl'])){
        $sql="select * from project ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
    }
    else{
        $sql ="select * from project where lower(project_name) like '$_POST[titl]%' or upper(project_name) like '$_POST[titl]%' ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
    }
}
else{
     $sql="select * from project ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
}
$result = pg_query($db,$sql);
$i = 1;
echo 
"<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>";
echo '<table id = "t01">';
echo "<th>Number</th>";
echo "<th>Picture</th>";
echo "<th>Project Name</th>";   
echo "<th>Creator</th>";
echo "<th>Target</th>";
echo "<th>Raised</th>";
echo "<th>Link</th>";
echo "<th>Delete</th>";
while($row = pg_fetch_assoc($result)) {
    $image = $row['picture_url'];
    $imageData = base64_encode(file_get_contents($image));
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>";
    echo '<img src="data:image/jpeg;base64,'.$imageData.'"height="100" width="100"/>';
    echo "</td>";
    echo "<td>$row[project_name]</td>";
    echo "<td>$row[creator]</td>";
    echo "<td>$row[target]</td>";
    echo "<td>$row[raised]</td>";
    echo "<td>";
    if($row[creator]==$_SESSION['email'] || $is_admin == 'T'){
        echo "<form method=post action=profile_page.php >
        <input type=hidden name=owner value= '$row[creator]' >
        <input type=hidden name=title value='$row[project_name]' >
        <input type=submit name=submit value=move ></form> ";
    }
    else{
        echo "<form method=post action=profilepage_notuser.php >
        <input type=hidden name=title2 value= '$row[project_name]' >
        <input type=hidden name=not value= '$row[creator]' >
        <input type=submit name=submit value=go ></form> ";
    }
    echo "</td>";
    echo "<td>";
    if($is_admin == 'T'){
        echo "<form method=post action=deletion.php >
        <input type=hidden name=proj_email value='$row[creator]' >
        <input type=hidden name=proj_name value='$row[project_name]' >
        <input type=submit name=delete value= delete ></form> ";
    }
    else{
        echo "please kindly donate";
    }
    echo "</td>";
    echo "</tr>\n";
    $i++;
}

echo "</table>";


?> 
</section>
</div>

<div id = "footer">

</div>

</div>
</body>
</html>