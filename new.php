<?php

$servername= "localhost";
$username= "root";
$password = "";

$db_name = "php_log";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname=$_POST['FirstName'];
    $lname=$_POST['LastName'];
    $phone=$_POST['Phone'];
    $email=$_POST['Email'];
    $location=$_POST['Country'];
    $Interests=$_POST['Interests'];
    $Comments=$_POST['Comments'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['ConfirmPassword'];

      $sql = "INSERT INTO login (Firstname, Lastname, Phone, Email, Country, Interests, Passwords, ConfirmPassword, Comments) 
            VALUES ('$fname', '$lname', '$phone', '$email', '$location', '$Interests','$password','$confirmpassword', '$Comments')";

        // Execute the query and check for errors
    // if (mysqli_query($conn, $sql)) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    // if (mysqli_query($conn, $sql)) {
    //     echo "<div style='background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; max-width: 500px; margin: 20px auto; text-align: center;'>
    //             <strong>Success!</strong> Your information has been submitted successfully.
    //           </div>";
    // } else {
    //     echo "<div style='background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; max-width: 500px; margin: 20px auto; text-align: center;'>
    //             <strong>Error:</strong> " . mysqli_error($conn) . "
    //           </div>";
    // }

      if (mysqli_query($conn, $sql)) {
        // Redirect to the login page after success
        header("Location: new.html");
        exit(); // Stop further script execution after redirection
    } else {
        echo "<div style='background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; max-width: 500px; margin: 20px auto; text-align: center;'>
                <strong>Error:</strong> " . mysqli_error($conn) . "
              </div>";
    }
        
}
// Close the connection
mysqli_close($conn);
?>