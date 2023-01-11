<?php
/// Connection to MySQL parameters
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
    $sqlread = "SELECT * from student";
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

?>

<form method="POST" action="searchoutput.php">
    <br>
    <label for="search_type">Search by:</label>
    <select name="search_type" id="search_type">
        <option value="race">Race</option>
        <option value="gender">Gender</option>
    </select>
    <label for="search_value"> >> :</label>
    <input type="text" name="search_value" id="search_value">
    <input type="submit" value="Search">
</form>
