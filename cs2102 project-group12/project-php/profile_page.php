<!DOCTYPE html>
<html>
    <header>
    <title> Group12 Crowdfunding </title>
    </header>
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
      <p class="logoPlaceholder"><!-- <img src="logoImage.png" alt="sample logo"> --><span>Project</span></p>
  </div>
    <! -- user info -->
    <form id="part1" method ="post" onsubmit="return validate()">
        <! -- include from user data -->
        <span>User:  <?php session_start(); echo $_SESSION['email']; ?></span>
        <div id="headerLinks"><a href="index.php"> Logout </a></div>
    </form> 
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <?php
        include 'connect.php';
        session_start();
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[owner]' AND project_name = '$_POST[title]' ");		// Query template
        $row    = pg_fetch_assoc($result) ; ?>	
    <img src="<?php echo $row["picture_url"] ?>" alt="picture" style="width:250px;height:228px;"> 
  </div>
  <!-- Identity details -->
  <section class="profileHeader"> 
    <form name="part3" id="part3" method ="post" action = "handler.php">
      <?php
        include 'connect.php';
        session_start();
         $_SESSION['override']=$_POST['owner'];
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[owner]' AND project_name = '$_POST[title]' ");		// Query template
        $row    = pg_fetch_assoc($result) ;
          $_SESSION['project_name']=$row["project_name"];
        ?>	
    <h1>Title :  <input type="text" name="project_name" id="project_name" value ="<?php echo $row["project_name"] ?>" ></h1>
    <hr>
    <h2>Description :</h2>
    <textarea name="description" id="description" form="part3"><?php echo $row["description"] ?></textarea>

  </section>

</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Owner details</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
     <?php
        include 'connect.php';
        session_start();
        $is_admin=$_SESSION['is_admin'];
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[owner]' AND project_name = '$_POST[title]' ");		// Query template
        $row    = pg_fetch_assoc($result) ;
        $_SESSION['dummy']=$row["raised"];?>		
      <p><span>Email :</span> <?php echo $row["creator"] ?> </p>
      <p><span>created Date : </span><input type="text" name="created" id="created"  placeholder="format= yyyy-mm-dd" value= "<?php echo $row["created"] ?>" ></p>
      <p><span>Start Date : </span><input type="text" name="project_start" id="project_start"  placeholder="format= yyyy-mm-dd" value= "<?php echo $row["project_start"] ?>" ></p>
      <p><span>End Date: </span> <input type="text" name="project_end" id="project_end"  placeholder="format= yyyy-mm-dd" value= "<?php echo $row["project_end"] ?>" ></p>
      <p><span>funds needed: </span> <input type="text" name="target" id="target" value= "<?php echo $row["target"] ?>" ></p>
      <p><span>funds raised: </span>  <input type="text" name="raised" id="raised" value= "<?php echo $row["raised"] ?>" ></p>
      <p><span>status: </span> <input type="text" name="completed" id="completed" value= "<?php echo $row["completed"] ?>" ></p>
      <p><span>bank info: </span> <input type="text" name="bankinfo" id="bankinfo" value= "<?php echo $row["bankinfo"] ?>" ></p>
      <p><span>insert image address to update images </span> <input type="text" name="picture_url" id="picture_url" value= <?php echo $row["picture_url"] ?> ></p>
    </div>
  <aside class="externalResourcesNav">
    <p><span>password: </span> <input type="password" name="password2" id="password2"></p>
    <div class="externalResources"><input type="submit" name="update" value="update" /> </div>
      </form>
  </aside>
  </section>
</section>

</body>
</html>