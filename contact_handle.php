<?php
// Database configuration
$servername = "localhost"; // Your cPanel host, usually 'localhost'
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$student_name = $_POST['name'];
$parent_name = $_POST['parent'];
$parent_phone_no = $_POST['phoneNo'];
$email = $_POST['email'];
$child_age = $_POST['subject'];
$grade = $_POST['grade'];
$message = $_POST['message'];

// Prepare SQL statement
$sql = "INSERT INTO applications (student_name, parent_name, parent_phone_no, email, child_age, grade, message)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Bind parameters and execute statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssiss", $student_name, $parent_name, $parent_phone_no, $email, $child_age, $grade, $message);

if ($stmt->execute()) {
    echo "
