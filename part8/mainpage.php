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
    <form method ="post" action= "mainpage.php" >
    <?php session_start();
        $page_l=$_SESSION['pagel']; // page lower limit
        ?>
    <br>
    <p> view projects </p>
    <label>title : </label><input type ="text" name ="titl" id ="var1">
    <input type="submit" name ="search" value ="search" >
    <br>
    <input type="hidden" name="prev10_v" value =<?php session_start(); echo $page_l; ?>>
    <input type="submit" name="prev10" value ="previous 10">
    <input type="submit" name="next10" value ="next 10">
</form>
    <form method ="post" action="createprofile.php">
        <label>new project?</label>
        <input type="submit" name="redirect" value = "create new project" >
    </form>
    <br>
<?php
    session_start();
    $is_admin=$_SESSION['is_admin'];
    if($is_admin=='T'){
        echo "<form method =post action=deletion.php >
        <label>remove a user</label>
        <input type =text name=user_d >
        <input type=submit name=delete_u value =delete user> </form>";
    }
?>
<?php
// Create connection
include 'sign_in.php';
session_start();
$email=$_SESSION['email'];
$is_admin=$_SESSION['is_admin'];
$_SESSION['pagel']=$page_l;
$page_l=$_SESSION['pagel'];
$db = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");

if(empty($page_l)){
    $page_l=0;
}
if (isset($_POST['next10'])){
    $page_l +=10;
    $_SESSION['pagel']= $page_l;
}
if (isset($_POST['prev10'])){
    $page_l -=10;
    if($page_l <=0){
        $page_l=0;
    }
    $_SESSION['pagel']= $page_l;
}
if (isset($_POST['search'])){
    if (empty($_POST['titl'])){
        $sql="select * from project ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
    }
    else{
        $sql ="select * from project where lower(project_name) like '$_POST[titl]%' or upper(project_name) like '$_POST[titl]%' ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
    }
}
else{
     $sql="select * from project ORDER BY project_name ASC LIMIT 10 OFFSET $page_l ";
}
$result = pg_query($db,$sql);
$i = 1;
echo "<table>";
echo "<th> number</th>";
echo "<th>picture</th>";
echo "<th>project name</th>";   
echo "<th>creator</th>";
echo "<th>target</th>";
echo "<th>raised</th>";
echo "<th>click to go</th>";
echo "<th>delete</th>";
while($row = pg_fetch_assoc($result)) {
    $image = $row['picture_url'];
    $imageData = base64_encode(file_get_contents($image));
    echo "<tr>";
    echo "<td>$i</td>";
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
    echo "<td>";
    if($is_admin == 'T'){
        echo "<form method=post action=deletion.php >
        <input type=hidden name=proj_email value='$row[creator]' >
        <input type=hidden name=proj_name value='$row[project_name]' >
        <input type=submit name=delete value= delete ></form> ";
    }
    else{
        echo "please kindly donate";
    }
    echo "</td>";
    echo "</tr>\n";
    $i++;
}

echo "</table>";


?> 


</body>
</html>