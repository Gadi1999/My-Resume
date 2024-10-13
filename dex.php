<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jesudanam Gadi - Resume</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Jesudanam Gadi</h1>
    <h2>Profile</h2>
    <p>A highly self-motivated and results-oriented professional with experience in [Your field]. Passionate about [Your passions] and driven to make a positive impact in the world.</p>

    <h2>Experience</h2>
    <ul>
      </ul>

    <h2>Skills</h2>
    <ul>
      <li>[Skill 1]</li>
      <li>[Skill 2]</li>
      <li>[Skill 3]</li>
    </ul>

    <h2>Education</h2>
    <h3><img src="jdimg.jpg" alt=""></h3>
    <ul>
      <li>[Degree/Diploma] in [Field of Study]</li>
      <li>[Institution Name]</li>
    </ul>

    <a href="https://www.linkedin.com/in/jesudanamgadi/"><img src="linked.jpg" /></a>

    <h2>Contact Form</h2>
    <form action="submit_data.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="mobile">Mobile Number:</label>
      <input type="tel" id="mobile" name="mobile" required>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="inquiry_type">Inquiry Type:</label>
      <select id="inquiry_type" name="inquiry_type">
        <option value="job_application">Job Application</option>
        <option value="general_inquiry">General Inquiry</option>
        <option value="other">Other</option>
      </select>

      <button type="submit">Submit</button>
    </form>

    <h2>Experience Data</h2>
    <table>
      <thead>
        <tr>
          <th>Company</th>
          <th>Position</th>
          <th>Dates</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</body>
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

  $sql = "SELECT company, position, start_date, end_date FROM learncoding.experience";
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
</html>