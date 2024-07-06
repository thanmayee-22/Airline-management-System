<<?php

include 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$fair_economic = $_POST['Fair_Economic'];
$fair_business = $_POST['Fair_Business'];
$fair_vip =$_POST['Fair_VIP'];
$Available_seats = $_POST['Available_seats'];
// header("Refresh:2; url=addflight.html");


$s="select * from flights where Id='$id'";
$r=mysqli_query($conn,$s);

if(mysqli_num_rows($r)==0){
$sql = "INSERT INTO flights(Id, Name, Source, Destination, Departure, Arrival, Fair_Economic, Fair_Business, Fair_VIP, Available_seats) VALUES('$id', '$name', '$source', '$destination', '$departure', '$arrival', '$fair_economic', '$fair_business', '$fair_vip','$Available_seats')";
if(mysqli_query($conn,$sql)){


  echo "Flight Added!!!";

$sql1 = "INSERT IGNORE INTO cities (Name) VALUES('$source')";
$sql2 = "INSERT IGNORE INTO cities (Name) VALUES('$destination')";

mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);

header("Refresh:2; url=welcome.php");

mysqli_close($conn);
}
}
else{
   
  echo "Flight Not  Added ";
  echo "duplicate flight id!!!";
 
}






 ?>
