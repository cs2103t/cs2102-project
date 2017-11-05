<!DOCTYPE html>
<html>
<header>
    <title> Group12 Crowdfunding </title>
    </header>
<?php

$db  = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=fbcredits");
    if(isset($_POST['delete'])){
        $sql ="delete from invest where creator= '$_POST[proj_email]' AND project_name= '$_POST[proj_name]' "; // delete all investments from project
        $result=pg_query($db,$sql);
        $sql2 ="delete from project where creator = '$_POST[proj_email]' AND project_name= '$_POST[proj_name]' ";
        $result2 =pg_query($db,$sql2); 
        if($result2){
                echo "delete success";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        else{
            echo "delete failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        }
    if(isset($_POST['delete_u'])){
        
        $sql ="delete from invest where creator= '$_POST[user_d]' "; // delete all investments from project
        $result=pg_query($db,$sql);
        $sql1 ="delete from invest where account_email= '$_POST[user_d]' "; // delete all investments from project
        $result1=pg_query($db,$sql1);
        $sql2 ="delete from project where creator = '$_POST[user_d]' ";
        $result2 =pg_query($db,$sql2); 
        $sql3 ="select * from account where account_email = '$_POST[user_d]' ";
        $result3 =pg_query($db,$sql3); 
        $row=pg_fetch_assoc($result3);
        if($row){
        $sql4 ="delete from account where account_email = '$_POST[user_d]' ";
        $result4 =pg_query($db,$sql4); 
        if($result4){
                echo "deleted user successfully";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        else{
            echo "delete failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        }
        else{
            echo "user does not exists";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
        }
    if(isset($_POST['reset'])){
        $sql = "select * from account where account_email ='$_POST[user_d]' ";
        $result1=pg_query($db,$sql);
        if($result1){
            $sql1 = "UPDATE account SET account_password='Gp12password' WHERE account_email= '$_POST[user_d]' ";
            $result2 = pg_query($db,$sql1);
            if($result2){
                echo "password reseted sucessfully";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            }
            else{
                echo "password reset failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            }
        }
        else{
            echo "no such user exists";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
        }
    }
     if(isset($_POST['change'])){
         session_start();
         $email=$_SESSION['email'];
         $is_admin=$_SESSION['is_admin'];
        $sql = "select * from account where account_email ='$_SESSION[email]' AND account_password='$_POST[old]' ";
        $result1=pg_query($db,$sql);
         $row= pg_fetch_assoc($result1);
        if($row || $is_admin== 'T'){
            $new= $_POST['new'];
            $cfm=$_POST['cfm'];
            if($new==$cfm){
                if($is_admin == 'T'){
                    $sql1= "UPDATE account SET account_password= '$_POST[new]' WHERE account_email= '$_POST[user_d]' ";
                }
                else{
                    $sql1 = "UPDATE account SET account_password='$_POST[new]' WHERE account_email= '$_SESSION[email]' ";
                }
            $result2 = pg_query($db,$sql1);
            if($result2){
                echo "password changed sucessfully";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            }
            else{
                echo "password reset failed";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            }
            }
            else{
                echo "your confirm password and new password is different";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
            }
        }
         else{
             echo "please key in your previous password";?>
            <script type="text/javascript">window.location = "http://localhost/demo/part8/mainpage.php"</script>;<?php
         }
     }
    

?>
</html>