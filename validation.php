<?php


session_start();
 


$con= mysqli_connect('localhost','root');

if($con){

    echo"connection success";
}else{
    echo"no connection";
}

mysqli_select_db($con,'registration');

$name = $_POST['user'];
$pass = $_POST['password'];

$q= "select * from signin where name='$name' && password ='$pass'";

$result= mysqli_query($con,$q);

$num= mysqli_num_rows($result);

if($num == 1){
    $_SESSION ['username']= $name;
    header('location:moctest.php');
}else{
    header('location:login.html');
}






 





?>