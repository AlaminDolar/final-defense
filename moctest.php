<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.html');
}

$con= mysqli_connect('localhost','root');
// if($con){
//     echo "success"
// }
mysqli_select_db($con,'quizdbase');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    
<div class="container ">
 

   <br><h1 class="text-center text-primary">WiseMonkey Moc Test</h1><br>
   
   <h2 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?></h2> <br>
<div class="col-lg-8 m-auto d-block" >
<div class="card">

   <h4 class="text-center card-header" >Welcome <?php echo $_SESSION['username'];?> You have to select only one out of 4.Best of luck :)</h4 >
   
</div><br>

<form action="check.php" method="POST">

<?php
for($i=1; $i<6; $i++){
$q= "select * from questions where qid=$i";
$query= mysqli_query($con,$q);

while($rows= mysqli_fetch_array($query)){
?>

<div class="card">
 <h4 class="card-header"><?php  echo $rows ['question'];   ?></h4>


<?php

$q= "select * from answers where ans_id=$i";
$query= mysqli_query($con,$q);

while($rows= mysqli_fetch_array($query)){
?>

<div class="card-body">
<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']   ?>">
<?php echo $rows['answer'];?>

</div>





<?php
}
}
}
?>


<button class="text-center px-5 mb-5 btn-primary m-auto d-block" type="submit">Submit</button>


</div>
<div class="m-auto d-block">
<a href="login.html"class="btn btn-primary px-5 mb-3" >Logout</a><br>
</div>

<h5 class="text-center mb-3">@WiseMonkey</h5>
</form>

</div>





</body>
</html>