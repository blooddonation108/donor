<?php
// Updated database connection details
$host = 'sql3.freesqldatabase.com';
$dbname = 'sql3696358'; // Ensure this matches your actual database name
$username = 'sql3696358'; // New database user
$password = 'SNlqj9VAZP'; // New database password
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize input data
$name = $conn->real_escape_string($_POST['name']);
$phone_number = $conn->real_escape_string($_POST['phone_number']);
$email = $conn->real_escape_string($_POST['email']);
$passwordInput = $conn->real_escape_string($_POST['password']); // Receive and sanitize the password
$date_of_birth = $conn->real_escape_string($_POST['date_of_birth']);
$blood_group = $conn->real_escape_string($_POST['blood_group']);
$state = $conn->real_escape_string($_POST['state']);
$city = $conn->real_escape_string($_POST['city']);
$zipcode = $conn->real_escape_string($_POST['zipcode']);
$address = $conn->real_escape_string($_POST['address']);

// Hash the password
$hashed_password = password_hash($passwordInput, PASSWORD_DEFAULT);

// SQL query to insert user data into the database
$sql = "INSERT INTO user (name, phone_number, email, password, date_of_birth, blood_group, state, city, zipcode, address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssssssssss", $name, $phone_number, $email, $hashed_password, $date_of_birth, $blood_group, $state, $city, $zipcode, $address);
    
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    // Close statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close connection
$conn->close();
?>
