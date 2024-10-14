<?php
// Replace with your database credentials
$servername = "localhost:3306";
$username = "root";
$password = "Gadi@1999";
$dbname = "learncoding";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//test
// Initialize session (optional, can be placed elsewhere)
session_start();

// Check if login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Needs to be hashed before validation

    // Validate credentials against database (replace with your logic)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; // Hash password before storing in DB
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Login successful, store username in session
        $_SESSION['username'] = $username;
        echo "Login successful!";

        // Optional: Redirect to another page after successful login
        // header("Location: https://jdio.link/");
        // exit();
    } else {
        echo "Invalid username or password.";
    }
}

// Close connection
$conn->close();

// (Optional) Remove these lines if not required for your login page
// Set the desired time latency in seconds
$latency = 5;

// Sleep for the specified time
sleep($latency);

// Redirect to the target URL
header("Location: https://jdio.link/page.html");
exit();
?>