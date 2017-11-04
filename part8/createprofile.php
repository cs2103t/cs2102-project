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
      <p class="logoPlaceholder"><!-- <img src="logoImage.png" alt="sample logo"> --><span>project</span></p>
  </div>
    <! -- user info -->
    <form id="part1" method ="post" onsubmit="return validate()">
        <! -- include from user data -->
        <span>User: <?php session_start(); echo $_SESSION['email']; ?> </span>
    </form> 
  <div class="profilePhoto"> 
    <!-- Profile photo --> 
    <img src="http://tempusfilms.com/wp-content/uploads/2014/04/facebook_no_photo.jpg" alt="picture" style="width:250px;height:228px;">  
    </div>
  <!-- Identity details -->
  <section class="profileHeader"> 
    <h1>Title :  </h1>
    <hr>
    <h1>Description :</h1>
    <br>
    <textarea name="description" id="description" form="part1" ></textarea>
  </section>
</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Content Holder 1</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div class="section1Content">
        <?php include 'sign_in.php';
        ?>
      <p><span>Email : </span> <?php session_start(); echo $_SESSION['email'] ?> </p>
      <p><span>created Date : </span><input type="text" name="created" id="created" ></p>
      <p><span>Start Date : </span><input type="text" name="project_start" id="project_start" ></p>
      <p><span>End Date: </span> <input type="text" name="project_end" id="project_end" ></p>
      <p><span>funds needed: </span> <input type="text" name="target" id="target"  ></p>
      <p><span>funds raised: </span> <input type="text" name="raised" id="raised"  ></p>
      <p><span>bank info: </span> <input type="text" name="bankinfo" id="bankinfo" ></p>
    </div>
  <aside class="externalResourcesNav">
    <span class="stretch"></span>
    <div class="externalResources"><input type="submit" name="create" value="create" /> </div>
      </form>
  </aside>
  </section>
</section>

</body>
</html>