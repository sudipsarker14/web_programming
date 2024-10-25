<?php
session_start();
include 'dbconfig.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $confirmnewpassword = $_POST['confirmnewpassword'];
    $result = mysql_query("SELECT password FROM user_info WHERE user_id='$username'");
    if(!$result){
        echo "The username you entered does not exist";
        }
    else if($password!= mysql_result($result, 0)){
        echo "You entered an incorrect password";
        }
    else if($newpassword==$confirmnewpassword)
        $sql=mysql_query("UPDATE user_info SET password='$newpassword' where user_id='$username'");
        echo "Congratulations You have successfully changed your password";
        else{
       echo "Passwords do not match";
       }
?>