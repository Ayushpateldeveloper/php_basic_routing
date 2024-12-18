<?php

require_once 'config/database.php';
require_once 'models/User.php';

// Create database connection
$connection = mysqli_connect($host, $username, $password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create User model instance
$userModel = new User($connection);

// Insert a demo user
$username = 'ayupatel2310';
$email = 'ayushpatel232002@gmail.com';
$password = '123456';
$role = 'admin';
$createdBy = 'admin';

if ($userModel->insertUser($username, $email, $password, $role, $createdBy)) {
    echo "User inserted successfully!";
} else {
    echo "Failed to insert user.";
}

// Close the database connection
mysqli_close($connection);

?>
