<?php
// Updated database connection details
$host = 'sql3.freesqldatabase.com'; // New host
$dbname = 'sql3696358'; // New database name
$username = 'sql3696358'; // New username
$password = 'SNlqj9VAZP'; // New password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donors data
$sql = "SELECT id, name, phone_number, email, date_of_birth, blood_group, state, city, zipcode, address FROM user";
$result = $conn->query($sql);

$donors = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $donors[] = $row;
    }
}

// Close connection
$conn->close();

// Output data in JSON format
echo json_encode($donors);
?>
