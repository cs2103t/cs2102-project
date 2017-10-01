<!DOCTYPE html>
<head>
<title>Sign In </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>
<script>
    function validate(){
        var user = document.getElementById("email");
        var password =document.getElementById("password");
        if (user.value==''){ // check that its not null input
            alert("please enter your username");
            return false;
        }
        if (password.value==''){ // check that its not null input
            alert("please enter your password");
            return false;
        }
    }
</script>
<body>
<li>Sign in here</li>
<ul>
<form name = "insert" method ="post" onsubmit="return validate()" action = "sign_in.php">
<li>E-mail:</li>
<li><input type = "text" name = "email" id ="email"></li>
<li>Password:</li>
<li><input type = "password" name = "password" id ="password"></li>
<li>User Type:<li>
<input type = "radio" name = "user_type" value = "T"> Admin
<input type = "radio" name = "user_type" value = "F"> User
<li><input type = "submit" name = "submit" value = "login" ></li>
</form>
</ul>


</body>
<html>