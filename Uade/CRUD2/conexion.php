<?php
    $con = mysqli_connect("localhost", "root", "", "crud3");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
    // mysqli_close($con); // Uncomment this line to close the connection when done 
?>