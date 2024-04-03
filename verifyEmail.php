<?php
$host = 'sql3.freesqldatabase.com'; // Updated database host
$dbname = 'sql3696358'; // Updated database name
$username = 'sql3696358'; // Updated database username
$password = 'SNlqj9VAZP'; // Updated database password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Prepare statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email exists in the database.";
} else {
    echo "Email not found.";
}

$stmt->close();
$conn->close();
?>
