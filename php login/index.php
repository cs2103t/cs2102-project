<!DOCTYPE html>
<head>
<title>Sign In </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>

<body>
<li>Sign in here</li>
<ul>
<form name = "insert", action = "sign_in.php", method = "POST">
<li>E-mail:</li>
<li><input type = "text" name = "email"></li>
<li>Password:</li>
<li><input type = "password" name = "password"></li>
<li>User Type:<li>
<input type = "radio" name = "user_type" value = "T"> Admin
<input type = "radio" name = "user_type" value = "F"> User
<li><input type = "submit" name = "submit" value = "login"></li>
</form>
</ul>


</body>
<html>
    
    
    
