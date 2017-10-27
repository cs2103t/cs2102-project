<!doctype html>
<html>
<header>
    <! -- user info -->
    <form id="part1" method ="post" onsubmit="return validate()">
        <! -- include from user data -->
        <span>User: <?php session_start(); echo $_SESSION['email']; ?> </span>
    </form>
</header>
<body>
    <form method ="post" action= "testing.php" >
    <br>
    <p> view projects </p>
    <label>title : </label><input type ="text" name ="titl" id ="var1">
    <input type="submit" name ="search" value ="search" >
</form>
    <form method ="post" action="createprofile.php">
        <label>new project?</label>
        <input type="submit" name="redirect" value = "create new project" >
    </form>
<?php
// Create connection
include 'sign_in.php';
session_start();
$email=$_SESSION['email'];
$db = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
if (isset($_POST['search'])){
    $sql ="select * from project where lower(project_name) like '$_POST[titl]%' or upper(project_name) like '$_POST[titl]%' ";
}
else{
    $sql="select * from project";
}
$result = pg_query($db,$sql);
echo "<table>";
echo "<th>picture</th>";
echo "<th>project name</th>";   
echo "<th>creator</th>";
echo "<th>target</th>";
echo "<th>raised</th>";
echo "click to go";
while($row = pg_fetch_assoc($result)) {
    $image = $row['picture_url'];
    $imageData = base64_encode(file_get_contents($image));
    echo "<tr>";
    echo "<td>";
    echo '<img src="data:image/jpeg;base64,'.$imageData.'"height="100" width="100"/>';
    echo "</td>";
    echo "<td>$row[project_name]</td>";
    echo "<td>$row[creator]</td>";
    echo "<td>$row[target]</td>";
    echo "<td>$row[raised]</td>";
    echo "<td>";
    if($row[creator]==$_SESSION['email']){
        echo "<form method=post action=profile_page.php >
        <input type=hidden name=title value='$row[project_name]' >
        <input type=submit name=submit value=move ></form> ";
    }
    else{
        echo "<form method=post action=profilepage_notuser.php >
        <input type=hidden name=title2 value= '$row[project_name]' >
        <input type=hidden name=not value= '$row[creator]' >
        <input type=submit name=submit value=go ></form> ";
    }
    echo "</td>";
    echo "</tr>\n";
}

echo "</table>";


?> 


</body>
</html>