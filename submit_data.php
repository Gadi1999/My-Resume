<?php
// Replace with your database credentials
include 'databaseconn.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$inquiry_type = $_POST['inquiry_type']; // Capture the selected value

// Prepare and execute the INSERT statement (secure against SQL injection)
$stmt = $conn->prepare("INSERT INTO FRONTFORM (name, mobile, email, inquiry_type) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $mobile, $email, $inquiry_type);

if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Set the desired time latency in seconds
$latency = 5;

// Sleep for the specified time
sleep($latency);

// Redirect to the target URL
header("Location: https://jdio.link");
exit();

?>