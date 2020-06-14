<?php
$servername="localhost";
$username="root";
$password="12345";
$dbname="cart";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){

}
else{
die("ERROR".mysqli_connect_error()) ;
}

?>
