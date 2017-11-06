<!DOCTYPE html>
<html>
<header>
    <title> Group12 Crowdfunding </title>
    </header>

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
      <p class="logoPlaceholder"><!-- <img src="logoImage.png" alt="sample logo"> --><span>project</span></p>
  </div>
    <! -- user info -->
    <form id="part1" method ="post" onsubmit="return validate()">
        <! -- include from user data -->
        <span>User: <?php session_start(); echo $_SESSION['email']; ?> </span>
        <div id="headerLinks"><a href="index.php"> Logout </a></div>
    </form> 
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <?php
        include 'connect.php';
        session_start();
        $creator=$_POST['not'] ;
        $title =$_POST['title2'];
        $_SESSION['title']=$title;
        $_SESSION['creator']=$creator;
        	
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[not]' AND project_name = '$_POST[title2]' ");		// Query template
        $row    = pg_fetch_assoc($result) ; ?>	
    <img src="<?php echo $row["picture_url"] ?>" alt="picture" style="width:250px;height:228px;">  
    </div>
  <!-- Identity details -->
  <section class="profileHeader"> 

    <?php
        include 'connect.php';
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[not]' AND project_name = '$_POST[title2]' ");		// Query template
        $row    = pg_fetch_assoc($result) ; ?>	
    <h1>Title :  <?php echo $row["project_name"] ?></h1>
    <hr>
    <h1>Description :</h1>
    <br>
    <textarea name="description" id="description" form="part1" ><?php echo $row["description"] ?></textarea>
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
        <form id="part2">
      <?php
        include 'connect.php';
        session_start();
        $result = pg_query($db, "SELECT * FROM project 
        	where creator = '$_POST[not]' AND project_name = '$_POST[title2]' ");		// Query template
        $row    = pg_fetch_assoc($result) ;
        $_SESSION['override']=$row['raised'];
        $override=$_SESSION['override'];
            ?>
      <p><span>Email : </span> <?php echo $row["creator"] ?> </p>
      <p><span>created Date : </span><?php echo $row["created"] ?></p>
      <p><span>Start Date : </span><?php echo $row["project_start"] ?></p>
      <p><span>End Date: </span> <?php echo $row["project_end"] ?></p>
      <p><span>funds needed: </span> <?php echo $row["target"] ?></p>
      <input type="hidden" id="target" value =<?php echo $row["target"] ?> >
      <p><span>funds raised: </span> <?php echo $row["raised"] ?></p>
      <input type="hidden" id="raised" value =<?php echo $row["raised"] ?> >
      <p><span>status: </span> <?php echo $row["completed"] ?></p>
      <p><span>bank info: </span><?php echo $row["bankinfo"] ?></p>
        </form>
    </div>
  <aside class="externalResourcesNav">
 <style>
    #pbc {
        width :300 px;
        height :16px;
        background: #FFF;
        border: 2px solid red;
    }
    #pb{
        position: relative;
        top:0px;
        background: #06C;
        width:0%;
        height :16px;
        color:antiquewhite;
        text-align: center;
        }
    #pbt{
        position: relative;
        top:-19px;
        text-align: center;
        color: #000;
        padding: 4px;
        height: 8px;
        font-size: 12px;
    }
    </style>
    <div id= "pbc">
        <div id= "pb"></div>
        <div id ="pbt"></div>
      </div>
      <div>
        <form id="part0" method ="post" onsubmit="return validate()" action = "handler.php">

        <label>donation amount</label><input type ="text" name="funds" id= "funds" >
        <input type ="submit" name="donate" id= "donate" value ="donate">
        </form>
      </div>

    <script>
        // get funds raised from pbt = progress bar text
        var funds=document.getElementById("raised");
        var funds_needed=document.getElementById("target");
        var funds_i=parseFloat(funds.value);
        var target = parseFloat(funds_needed.value);
        var funds_pcent = funds_i/target;
        if (funds_pcent >=1){
            funds_pcent=1;
        }
        var pbt = document.getElementById("pbt");
        var pb = document.getElementById("pb");
        pb.style.width = funds_pcent*100 +"%";
        pbt.innerHTML = funds_pcent*100 +"%";
    </script>
  </aside>
  </section>
</section>
</body>
</html>