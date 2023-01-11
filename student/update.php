<?php

// Connection to MySQL parameters
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // get the values from the form
    $matric = $_POST["matric"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $race = $_POST["race"];
    $gender = $_POST["gender"];
    // create the query
    $sqlupdate = "UPDATE student SET name='$name', email='$email', race='$race', gender='$gender' WHERE matric_num='$matric'";
    // execute query
    $result = $conn->query($sqlupdate);
    // check if update was successful
    if ($result) {
        echo "Student information updated successfully";
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}

// Close Connection
$conn->close();
