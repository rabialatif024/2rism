<?php
// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'tour';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user information from the form
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Insert user into the database
$query = "INSERT INTO users (email, password, confirmpassword) VALUES ('$email', '$password', '$confirmpassword')";
if ($conn->query($query) === TRUE) {
    // Redirect to the login page after successful signup
    header("Location: loginSignup.html");
} else {
    // Handle error if signup fails
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>