<?php
        // Database connection settings
        $db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'tour';
        
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Retrieve user information from the form
        $destination = $_POST['destination'];
        $people = $_POST['people'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];

        // Insert user into the database
        $query = "INSERT INTO booknow (destination,people,checkin,checkout) VALUES ('$destination', '$people', '$checkin','$checkout')";
        if ($conn->query($query) === TRUE) {
            // Redirect to the login page after successful signup
            header("Location: index.html");
        } else {
            // Handle error if signup fails
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        
        $conn->close();?>