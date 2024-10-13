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

// Function to fetch and display experience data
function getExperienceData() {
  global $conn; // Access the global connection variable

  $sql = "SELECT company, position, start_date, end_date FROM experience";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $output = "";
    while($row = $result->fetch_assoc()) {
      $startDate = !empty($row['start_date']) ? $row['start_date'] : 'Present';
      $endDate = !empty($row['end_date']) ? $row['end_date'] : 'Present';
      $output .= "<tr><td>" . $row['company'] . "</td><td>" . $row['position'] . "</td><td>" . $startDate . " - " . $endDate . "</td></tr>";
    }
    return $output;
  } else {
    return "<tr><td colspan='3'>No experience data found</td></tr>";
  }
}

// Retrieve experience data
$experienceData = getExperienceData();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">