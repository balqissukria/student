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
    // get the search criteria from the form
    $search_type = $_POST["search_type"];
    $search_value = $_POST["search_value"];

    // create the query
    $sqlread = "SELECT * from student WHERE $search_type = '$search_value'";
    // execute query
    $result = $conn->query($sqlread);
    // iterate through all rows in result set
  
    echo "<table align='center' border ='1px'>";
    echo "<tr><td>Matric </td>
    <td>Name</td>
    <td>Email</td>
    <td>Race</td>
    <td>Gender</td>
    <td>Edit</td>
    </tr>";
    while ($row = mysqli_fetch_array($result)) {
        // extract specific fields
        $matric = $row["matric_num"];
        $name = $row["name"];
        $email = $row["email"];
        $race = $row["race"];
        $gender = $row["gender"];

        // output student information
        echo "<tr><td>$matric</td>
        <td>$name</td>
        <td>$email</td>
        <td>$race</td>
        <td>$gender</td>
        <td><a href='edit.php?matric=$matric'>Edit</a></td>

        </tr>";
    }

    echo "</table>";
}

// Close Connection
$conn->close();