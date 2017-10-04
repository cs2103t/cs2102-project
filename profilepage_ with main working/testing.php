<!doctype html>
<html>
<script>
function toggle(){
    var t1 = document.getElementById("username");
    var t2 = document.getElementById("var2");
    if(t1.value == t2.value){
        //change website for us will be localhost something
        window.location = "http://localhost/demo/profile_page.php";
    }
    else{
        window.location = "http://localhost/demo/profile_page_notuser.php";
    }
}
</script>
<body>
<form method ="post" action="profile_page.php" >
    <input type ="text" name ="username" id ="username" >
    <input type="submit" name="login" id="login" value="login">
    <br>
    <p>title</p><input type ="text" name ="var1" id ="var1">
    <p>email</p><input type ="text" name ="var2" id ="var2">
    <input type="submit" name ="search" value ="search" >
</form>
</body>
</html>