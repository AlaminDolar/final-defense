<?php

session_start();
if(!isset($_SESSION['username'])){
    header('locationog:lin.html');
}

$con= mysqli_connect('localhost','root');
// if($con){
//     echo "success"
// }
mysqli_select_db($con,'quizdbase');

if(isset($_POST['submit'])){

    if(!empty($_POST['quizcheck']))
    {
        $count= count($_POST['quizcheck']);
        echo "Out of 5, you have selected " .$count. " options";
    }
}

?>