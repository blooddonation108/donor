<?php
// Assume connection to database is already established

// Get donor ID from URL
$donorId = $_GET['id'];

// Fetch donor data from database
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $donorId);
$stmt->execute();
$result = $stmt->get_result();
$donor = $result->fetch_assoc();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Donor</title>
    <!-- Include your CSS file here -->
</head>
<body>
    <h2>Edit Donor</h2>
    <form action="updateDonor.php" method="post">
        <input type="hidden" name="id" value="<?php echo $donor['id']; ?>">
        <!-- Create form fields for each donor attribute, pre-populated with donor data -->
        <input type="text" name="name" value="<?php echo $donor['name']; ?>">
        <!-- Add more fields as needed -->
        <button type="submit">Update Donor</button>
    </form>
</body>
</html>
