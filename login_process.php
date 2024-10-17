<?php
// Replace with your database credentials
$servername = "4.240.55.215:3306";
$username = "root";
$password = "Gadi@1999";
$dbname = "learncoding";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize session
session_start();

// Check if login form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials against database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user_data = $result->fetch_assoc();

        // Verify password using password_verify (assuming passwords are hashed)
        if (password_verify($password, $user_data['password'])) {
            // Login successful, create session variables
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['loggedin'] = true;

            // Optional: Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);

            // Redirect to dashboard or another page after successful login
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    // Close prepared statement
    $stmt->close();
}

// Close connection
$conn->close();

// Optional latency for redirect (if needed)
$latency = 5;
sleep($latency);
header("Location: https://jdio.link/index.html"); // Remove or modify if not needed
exit();
?>
