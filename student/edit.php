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
    // get the matric number from the URL
    $matric = $_GET["matric"];
    // create the query
    $sqlread = "SELECT * FROM student WHERE matric_num = '$matric'";
    // execute query
    $result = $conn->query($sqlread);
    // extract student data from result set
    $row = mysqli_fetch_array($result);
    // extract specific fields
    $matric = $row["matric_num"];
    $name = $row["name"];
    $email = $row["email"];
    $race = $row["race"];
    $gender = $row["gender"];

    // output form to edit student information
    echo "<form action='update.php' method='post'>
    Matric: <input type='text' name='matric' value='$matric' readonly><br>
        Name: <input type='text' name='name' value='$name'><br>
        Email: <input type='text' name='email' value='$email'><br>
        Race: <input type='text' name='race' value='$race'><br>
        Gender: <input type='text' name='gender' value='$gender'><br>
        <input type='submit' value='Submit'>
    </form>";
}



// Close Connection
$conn->close();

