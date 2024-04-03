<?php
session_start(); // Start the session to access user information

// Check if the user is logged in. This is a placeholder condition.
// In a real application, you would check a session variable that indicates user login status.
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Assuming user's name is stored in session when they log in
$userName = $_SESSION['user_name'] ?? 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor's Dashboard</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Ensure you have this CSS file for styling -->
</head>
<body>
    <div class="dashboard-wrapper">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($userName); ?></h1>
            <nav>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <!-- Add more navigation items as needed -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <h2>Donation History</h2>
                <!-- Donation history content goes here -->
            </section>
            <!-- Add more sections as needed -->
        </main>
        <footer>
            <p>Donor Dashboard &copy; <?php echo date("Y"); ?></p>
        </footer>
    </div>
</body>
</html>
