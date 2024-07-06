
<style>
table {
  width: 100%;
}

th{
  height: 50px;
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;
  background-color: #63b8ff;
  color: white;
}

td {
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;

}
/*tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}*/
tr:hover:not(.active) {
    background-color: #ffffe0;
  }

  .active {
    background-color: #63b8ff;
  }
</style>
<!DOCTYPE html>
<html>
<head>
  <style>
  ul {
    list-style-type: none;
    margin: 0;
    padding: 20px;
    overflow: hidden;
    background-color: none;
    font-size: 17px;
    
  }

  li {
    float: right;
  }

  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    
  }


  li a:hover:not(.active) {
    background-color: #87cefa;
  }

  .active {
    background-color: #63b8ff;
  }

  body{
    background: url("images/wall_2.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .wrapper{
    width: 350px; padding: 20px;
    display: block;
    color: black;
    text-align: left;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 25px;
    font-family: sans-serif;
    //background-image: url("images/cssback.png");

  }
  p{
    font-size: 20px;
    font-family: sans-serif;
    font-weight: bold;
  }
</style>


</head>
<body>

  <ul>
    <li><a href="logout.php">Logout</a></li>
    <li style="font-weight: bold;"><a class="active" href="welcome.php">Home</a></li>
    <li><a href="addflight.html">Add Flight</a></li>
    <li><a href="deleteflight.html">Delete Flight</a></li>
    <li><a href="updateflight.html">Update Flight</a></li>
   <!-- <li><a href="cancelbooking.html">Cancel Booking</a></li>-->
    <li><a href="feedback.php">User feedback</a></li>

    <li style="float: left; color:white; font-weight:bold ;font-family: sans-serif;font-size: 43px;"> ON AIR </li>
  </ul>

  <p>Flight Status:</p><br>


  <<?php

  include 'config.php';

  $sql = "SELECT * FROM flights";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr><th>Id</th><th>Name</th><th>Source</th><th>Destination</th><th>Departure</th><th>Arrival</th><th>Fair_Economic</th><th>Fair_Business</th><th>Fair_VIP</th><th>Available_seats</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$row['Departure']}</td><td>{$row['Arrival']}</td><td>{$row['Fair_Economic']}</td><td>{$row['Fair_Business']}</td><td>{$row['Fair_VIP']}</td><td>{$row['Available_seats']}</td></tr>";

  }
  echo "</table>";


  mysqli_close($conn);

  ?>
  <br><br>

  <p>User Status:</p><br>
  <<?php

  include 'config.php';

  $sql = "SELECT * FROM users";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr><th>UserId</th><th>FirstName</th><th>LastName</th><th>MobileNo</th><th>Email</th><th>Flight_Id</th><th>Seats_booked</th><th>Total_Cost</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['UserId']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td><td>{$row['MobileNo']}</td><td>{$row['Email']}</td><td>{$row['Flight_Id']}</td><td>{$row['Seats_booked']}</td><td>{$row['Total_Cost']}</td></tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>

</body>
</html>
