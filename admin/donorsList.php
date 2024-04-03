<?php
// Updated connection parameters
$host = 'sql3.freesqldatabase.com'; // New host
$dbname = 'sql3696358'; // New database name
$username = 'sql3696358'; // New MySQL username
$password = 'SNlqj9VAZP'; // New MySQL password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch donors data
$sql = "SELECT id, name, phone_number, email, date_of_birth, blood_group, state, city, zipcode, address FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Donors</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="sidebar">
        <a href="donorsList.php">View Donors</a>
        <a href="manageRequests.php">Manage Requests</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div class="main">
        <h1>Donors List</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Zipcode</th>
                    <th>Address</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["phone_number"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["date_of_birth"]; ?></td>
                    <td><?php echo $row["blood_group"]; ?></td>
                    <td><?php echo $row["state"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                    <td><?php echo $row["zipcode"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No donors found.</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
    </div>
</body>
</html>
