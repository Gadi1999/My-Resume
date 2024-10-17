<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html");
    exit();
}

// User is logged in, display the page
echo "Welcome, " . $_SESSION['username'];
header("Location: page.php");
?>
