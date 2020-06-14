<?php
session_start();
include("connection.php");
error_reporting(0);
?>

<?php

if(isset($_POST['submit'])) {

$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$check=$_POST['check'];



if (preg_match("#[0-9]+#", $name) || preg_match("[\W]+",$name)) {
$errorn = "Username must not include number or special character";
}


if (preg_match("#[a-zA-Z]+#", $name)) {
$erroename = "Password must not include character!";

}
if(strlen($password)<6){
$pmsg="Password should be greater than 6";
$msgclass="alert-danger";
}

if (empty($_POST['check'])){
$cmsg="Did you forgot to check the box? ";
$msgclass="alert-danger";
}
if (!empty($email) && !empty($name) && !empty($password)  && !(empty($check))) {


echo '<h3 style="color:green;">You have been registered successfully</h3>';
echo $name,$email,$password;
$query="INSERT INTO customer(name,email,password,phone) VALUES('$name','$email','$password',' ')";
$data=mysqli_query($conn,$query);
echo $data;
}

}


if(isset($_POST['submitln'])) {

$uname=$_POST['uname'];
$pass=$_POST['pass'];

$query= "SELECT * FROM customer WHERE name='$uname' and password='$pass'";
$result=mysqli_query($conn,$query);


$row= mysqli_num_rows($result);
if ($row) {
$a=mysqli_fetch_all($result,MYSQLI_ASSOC);
$_SESSION['Username']=$uname;
$_SESSION['Userid']= $a[0]['customer_id'];
header('location:index.php');
}
else{
$row=1;
}
}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="signup_back.css">
<title></title>
</head>
<body>
<header>
<div class="container">
<img src="chef.png" height="200px" width="200px">
<p>Hello there! Join and unleash the <span>Feast</span></p>
</div>
</header>

<?php if($row):  ?>
<div class="alert alert-danger" style="width: 300px; margin: 0 auto; text-align: center;"><?php echo "Wrong password. Have you registered?"  ?></div>
<?php endif; ?>


<div class="sign">
<div class="container">



<form method="POST" id="myloginForm">
<h1>Log in</h1>

 <div class="form-group">
   <label for="exampleInputname">Username</label>
   <input type="text" class="form-control" name="uname"  placeholder="Enter your username">
 </div>

 <div class="form-group">
   <label for="exampleInputname">Password</label>
   <input type="password" class="form-control" name="pass" placeholder="Enter password">
 </div>

 <button type="submit" name="submitln" class="btn btn-primary">Log in</button>
</form>



<form method="POST" id="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
 <h1>Sign in</h1>
 
 <!--<?php if($data):  ?>
  <div class="text-success"><?php echo "Congradulations! You have registered successfully"; ?></div>
 <?php endif; ?>-->
 
 <?php if(!empty($msg)):  ?>
  <div class="alert <?php echo $msgclass  ?>"><?php echo $msg  ?></div>
 <?php endif; ?>
 
 

 <div class="form-group">
  <?php if(preg_match("#[0-9]+#", $name)):   ?>
  <div class=" text-danger"><?php echo $errorn  ?></div>
  <?php endif; ?>
  <?php if(preg_match("#[0-9]+#", $name)):   ?>
  <div class=" text-danger"><?php echo $erroename ?></div>
  <?php endif; ?>
   <label for="exampleInputname">Name</label>
   <input type="text" class="form-control" name="username"  placeholder="Enter name">
 </div>

 <div class="form-group">
   <label for="exampleInputEmail1">Email address</label>
   <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
 </div>

 <div class="form-group">
   <label for="exampleInputPassword1">Password</label>
   <div class="text-danger" id="passerror"></div>
   <?php if(!empty($pmsg)):  ?>
   <div class="alert <?php echo $msgclass  ?>"><?php echo $pmsg  ?></div>
    <?php endif; ?>
   <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
 </div>


 <div class="form-group form-check">
   <input type="checkbox" class="form-check-input" name="check" id="Check">

<?php if(!empty($cmsg)):  ?>
<div class="alert <?php echo $msgclass  ?>"><?php echo $cmsg  ?></div>
<?php endif; ?>

   <div class="text-danger" id="checkerror"></div>
   <label class="form-check-label" for="exampleCheck1">Check me out</label>
 </div>

 <button type="submit" name="submit" class="btn btn-primary">Register</button>
</form>

<div class="signup_img">
<img src="https://images.pexels.com/photos/914388/pexels-photo-914388.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" height="500px" width="400px">
<button type="submit" id="lgn" class="btn btn-light">Already registered? Join in</button>
<button type="submit" id="lgnr" class="btn btn-light">Register</button>
</div>
</div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script>
  $(document).ready(function(){
  $('#myloginForm').hide();
  $('#myForm').show();
  $('#lgnr').hide();
  $('#lgn').show();

  $('#lgnr').on('click',function(){
  $('#lgn').toggle(1500);
  $('#lgnr').toggle(1500);
  $('#myForm').toggle();
  $('#myloginForm').toggle();
  })

  $('#lgn').on('click',function(){
  $('#lgn').toggle(1500);
  $('#lgnr').toggle(1500);
  $('#myForm').toggle();
  $('#myloginForm').toggle();
  })
  });
  </script>

</body>
</html>