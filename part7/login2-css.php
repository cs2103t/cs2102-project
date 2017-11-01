<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Page template By Adobe Dreamweaver CC</title>
<link href="login_page.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
      <h2 class="sectionTitle">Login here or <a href="register.php"> Click here to register.</a></h2>
    <hr class="sectionTitleRule">
    <div class="section1Content">
        <form name = "insert" action = "sign_in.php" method = "POST">
        <li>E-mail </li>
        <li><input type = "text" name = "email"></li>
        <li>Password </li>
        <li><input type = "password" name = "password"></li>
        <li><input type = "submit" name = "submit" value = "login"></li>
</form>
    </div>
  </section>
</section>
</body>
</html>