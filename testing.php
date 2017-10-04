<!doctype html>
<html>
<body>

<form method ="post" action= "profile_page.php" >
    <p> view your own projects</p>
    <br>
    <label>username</label><input type ="text" name ="var2" id ="username" >
    <label>title</label><input type ="text" name ="var1" id ="var1">
    <input type="submit" name ="search" value ="search" >
    </form>
    <form method ="post" action= "profilepage_notuser.php" >
    <br>
    <p> view others </p>
    <label>title</label><input type ="text" name ="var1" id ="var1">
    <label>email</label><input type ="text" name ="var2" id ="var2">
    <input type="submit" name ="search" value ="search" >
</form>


</body>
</html>