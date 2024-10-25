<?php
session_start(); // To get the user data if stored in the session

// Database connection settings
$servername = "localhost"; 
$username = "root";         
$password = "";             
$dbname = "registration_db"; 

try
{
 $db = new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) 
{
  echo "<br> PDO Connection ERROR ".$e->getMessage(); 
}
// Function to hash the password (can use bcrypt)
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify password
function verifyPassword($inputPassword, $storedHash) {
    return password_verify($inputPassword, $storedHash);
}

// Retrieve user data (assuming user is logged in)
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die("User is not logged in.");
}

// Get the form data
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Check if new password and confirm password match
if ($new_password !== $confirm_password) {
    die("New passwords do not match.");
}

// Check if the new password meets the security requirements
if (strlen($new_password) < 8) {
    die("New password should be at least 8 characters long.");
}

// Fetch user's current password from the database
$query = $db->prepare("SELECT password FROM users WHERE id = :id");
$query->bindParam(':id', $userId, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}

// Verify current password
if (!verifyPassword($current_password, $user['password'])) {
    die("Current password is incorrect.");
}

// Hash the new password
$new_password_hashed = hashPassword($new_password);

// Update the password in the database
$update_query = $db->prepare("UPDATE users SET password = :new_password WHERE id = :id");
$update_query->bindParam(':new_password', $new_password_hashed);
$update_query->bindParam(':id', $userId, PDO::PARAM_INT);
$update_query->execute();

echo "Password changed successfully.";
?>
