<!doctype html>
<html>
<script> /* all functions is here */
    function validate(){ /* to check if user have not missed out any input */
        var title =document.getElementById('title');
        var description=document.getElementById('description');
        var email =document.getElementById('email');
        var start_date = document.getElementById('start_date');
        var end_date = document.getElementById('end_date');
        var funding = document.getElementById('funding');
        if (title.value==''){
            alert('please enter your name');
            return false;
        }
        if (description.value==''){
            alert('please enter a description');
            return false;
        }
        if (email.value==''){
            alert('please enter your email');
            return false;
        }
        if (start_date.value==''){
            alert('please enter your start date');
            return false;
        }
        if (end_date.value==''){
            alert('please enter your start date');
            return false;
        }
        if (fudning.value==''){
            alert('please enter your start date');
            return false;
        }
    }
</script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Page template By Adobe Dreamweaver CC</title>
<link href="profile_page.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- Header content -->
<header>
  <div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
      <p class="logoPlaceholder"><!-- <img src="logoImage.png" alt="sample logo"> --><span>LOGO</span></p>
  </div>
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <img src="file:///C|/Users/PENITENT/AppData/Roaming/Adobe/Dreamweaver CC 2017/en_US/Configuration/Temp/Assets/eamDCE6.tmp/AboutPageAssets/images/profilephoto.png" alt="sample"> </div>
  <div class="userinfo"> 
    <! -- user info -->
    <form id="part1" method ="post" onsubmit="return validate()" action = "user.php">
        <! -- include from user data -->
        <?php 
        session_start();
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
        $user = '$_SESSION['email']' ;
         ?>
        <span>User: <input type="text" name = "user" id="user" value =<?php echo $user ?> ></span>
    </form> 
  </div>
  <!-- Identity details -->
  <section class="profileHeader"> 
    <form id="part1" method ="post" onsubmit="return validate()" action = "handler.php">
     <?php 
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
        $result = pg_query($db, "SELECT * FROM projects 
        	where creator = '$_POST[username]' AND project_name = '$POST[project_name]' ");	// Query template
        $row    = pg_fetch_row($result) ; ?>	
    <h1>Title :  <input type="text" name="project_name" id="project_name" value =<?php echo $row[0] ?>></h1>
    <hr>
    <label>Description</label>
    <br>
    <input type="text" name="description" id="description" value = <?php echo $row[8] ? >
  </section>
  <!-- Links to Social network accounts -->
  <aside class="socialNetworkNavBar">
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="file:///C|/Users/PENITENT/AppData/Roaming/Adobe/Dreamweaver CC 2017/en_US/Configuration/Temp/Assets/eamDCE6.tmp/AboutPageAssets/images/social.png" alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="file:///C|/Users/PENITENT/AppData/Roaming/Adobe/Dreamweaver CC 2017/en_US/Configuration/Temp/Assets/eamDCE6.tmp/AboutPageAssets/images/social.png"  alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="file:///C|/Users/PENITENT/AppData/Roaming/Adobe/Dreamweaver CC 2017/en_US/Configuration/Temp/Assets/eamDCE6.tmp/AboutPageAssets/images/social.png"  alt="sample"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="file:///C|/Users/PENITENT/AppData/Roaming/Adobe/Dreamweaver CC 2017/en_US/Configuration/Temp/Assets/eamDCE6.tmp/AboutPageAssets/images/social.png"  alt="sample"> </div>
  </aside>
</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Content Holder 1</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
     <?php
     	session_start();
     	
        $db     = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");	
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[username]' AND project_name = '$_POST[project_name]' ");		// Query template
        $row    = pg_fetch_row($result) ; ?>	
      <p><span>Email :</span><input type="text" name="creator" id="creator" value=<?php echo $row[1] ?> > </p>
      <p><span>created Date : </span><input type="text" name="created" id="created" value=<?php echo $row[4] ?>></p>
      <p><span>Start Date : </span><input type="text" name="project_start" id="project_start" value=<?php echo $row[5] ?>></p>
      <p><span>End Date: </span> <input type="text" name="project_end" id="project_end" value=<?php echo $row[6] ?>></p>
      <p><span>funds needed: </span> <input type="text" name="target" id="target" value=<?php echo $row[3] ?> ></p>
      <p><span>funds raised: </span> <input type="text" name="raised" id="raised" value=<?php echo $row[2] ?> ></p>
      <p><span>status: </span> <input type="text" name="completed" id="completed" value=<?php echo $row[7] ?> ></p>
      <p><span>bank info: </span> <input type="text" name="bankinfo" id="bankinfo" value=<?php echo $row[9] ?> ></p>
    </div>
  <aside class="externalResourcesNav">
    <div class="externalResources"><input type="submit" name="update" value="update" /> </div>
      </form>
  </aside>
  </section>
</section>
<footer>
  <hr>
  <p class="footerDisclaimer">2014  Copyrights - <span>All Rights Reserved</span></p>
  <p class="footerNote">John Doe - <span>Email me</span></p>
</footer>
</body>
</html>