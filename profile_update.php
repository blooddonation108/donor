<?php
session_start();
include 'db.php'; // Make sure you include the database connection

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$name = $_POST['name'];
$phone_number = $_POST['phone_number']; // Corrected to match the database field
$address = $_POST['address'];

$sql = "UPDATE user SET name = ?, phone_number = ?, address = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$name, $phone_number, $address, $userId])) {
    $_SESSION['success'] = "Profile updated successfully.";
} else {
    $_SESSION['error'] = "Failed to update profile.";
}
header("Location: profile.php");
exit();
?>
