<?php

include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $name = $_POST['us_name'];
   $password = $_POST['pass_no'];

   $sql = "SELECT userid FROM userlogin WHERE name = '$name' and Password = '$password'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //$active = $row['active'];

   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {
      $_SESSION["myusername"]=$username;
      $_SESSION['login_user'] = $username;
    

      header("location: website.php");
   }else {
      $error = "Your Login Name or Password is invalid<br><br>";
      echo $error;
      header("Refresh:2; url=userlogin.html");



   }
}

mysqli_close($conn);

 ?>
