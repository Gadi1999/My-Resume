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

// Initialize session (optional, can be placed elsewhere)
session_start();

// Check if login form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // **Do not store plain text password**

    // Validate credentials against database
    $sql = "SELECT * FROM users WHERE username = ?"; // Use prepared statement

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc(); // Get user data

        // Verify password using password hashing
        if (password_verify($password, $user_data['password'])) {
            // Login successful, store username in session
            $_SESSION['username'] = $username;
            echo "Login successful!";

            // Optional: Redirect to another page after successful login
            header("Location: https://jdio.link/page.html");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close(); // Close prepared statement (optional but recommended)
}

// Close connection
$conn->close();

// (Optional) Remove these lines if not required for your login page
// Set the desired time latency in seconds
$latency = 5;

// Sleep for the specified time
sleep($latency);
header("Location: https://jdio.link/index.html"); // Remove if not needed
exit();
?>