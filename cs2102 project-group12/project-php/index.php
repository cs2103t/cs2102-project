<!DOCTYPE html>
<html >
<header>
    <title> Group12 Crowdfunding </title>
    </header>
<head>
  <meta charset="UTF-8">
  <title>Crowdfunding: Login Form</title>
  
  
  <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="loginStyle.css">
  
</head>

<body>
    <div class="wrapper">
    <form class="form-signin" method="post" action="sign_in.php">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
        <h4><a href="registerPage.php">click here to register </a></h4>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>   
    </form>
  </div>
  
</body>
</html>
