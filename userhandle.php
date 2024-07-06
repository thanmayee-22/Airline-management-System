<?php

// initializing variables
$name = "";
$errors = array();

 include 'config.php';

  $name = $_POST['us_name'];
  $password_1 = $_POST['pass_no1'];
  $password_2 = $_POST['pass_no2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2)
   {
	array_push($errors, "The two passwords do not match");
    }
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userlogin WHERE name='$name' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Username already exists");
      
    }

  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO userlogin (name, Password)
  			  VALUES('$name','$password')";
  	mysqli_query($conn, $query);

    echo "Account Created. PLease login again.";

    header("Refresh:2; url= userlogin.html");
  }
  else {
    $arrlength = count($errors);

    for($x = 0; $x < $arrlength; $x++) {
        echo $errors[$x];
        echo "<br>";
        // header("Location:usersignup.html");
        header("Refresh:2; url= usersignup.html");
      }

    }
// ...
