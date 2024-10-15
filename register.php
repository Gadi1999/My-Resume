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

// Check if registration form is submitted
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // **Do not store plain text password**

    // Validate input data (add more validation as needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit();
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";

        // Optional: Redirect to login page or another page
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>