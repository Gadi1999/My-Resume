<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jesudanam Gadi - Resume</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: #f4f4f4;
    }

    /* Container for overall layout */
    .container {
      width: 80%;
      max-width: 700px;
      margin: 20px auto;
      padding: 2rem;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Header section */
    h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      text-align: center;
      color: #333;
    }

    h2 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: #555;
    }

    p {
      font-size: 1rem;
      line-height: 1.5;
      color: #666;
    }

    /* Content sections */
    .experience,
    .skills,
    .education {
      margin-bottom: 2rem;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      margin-bottom: 0.5rem;
      font-size: 1rem;
      color: #444;
    }

    /* Improved form styling */
    form {
      margin-top: 2rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 1rem;
    }

    label {
      font-size: 1rem;
      font-weight: bold;
      color: #333;
      margin-bottom: 0.5rem;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    select {
      padding: 0.7rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
      box-sizing: border-box;
    }

    /* Submit button */
    button[type="submit"] {
      background-color: #007BFF;
      color: white;
      padding: 0.7rem 1.5rem;
      font-size: 1rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
      width: 100%;
      box-sizing: border-box;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* LinkedIn icon image */
    .linkedin img {
      width: 30px;
      height: 30px;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Jesudanam Gadi</h1>
    <h2>Profile</h2>
    <p>A highly self-motivated and results-oriented professional with experience in [Your field]. Passionate about [Your passions] and driven to make a positive impact in the world.</p>
    
    <h2>Experience</h2>
    <ul class="experience">
      <?php
      // Replace with your database credentials
      $servername = "4.240.55.215:3306"; // or your IP address without the port
      $username = "root";
      $password = "Gadi@1999";
      $dbname = "learncoding";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Retrieve experience data from the database
      $sql = "SELECT company, position, duration FROM experiences";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<li>" . $row['position'] . " at " . $row['company'] . ", " . $row['duration'] . "</li>";
          }
      } else {
          echo "<li>No experience data found.</li>";
      }

      ?>
    </ul>

    <h2>Education</h2>
    <ul class="education">
      <?php
      // Retrieve education data from the database
      $sql_edu = "SELECT degree, field_of_study, institution FROM education";
      $result_edu = $conn->query($sql_edu);

      if ($result_edu->num_rows > 0) {
          while ($row_edu = $result_edu->fetch_assoc()) {
              echo "<li>" . $row_edu['degree'] . " in " . $row_edu['field_of_study'] . " from " . $row_edu['institution'] . "</li>";
          }
      } else {
          echo "<li>No education data found.</li>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </ul>

    <a class="linkedin" href="https://www.linkedin.com/in/jesudanamgadi/"><img src="linked.jpg" alt="LinkedIn"></a>
    <a class="linkedin" href="https://github.com/Gadi1999"><img src="Git.jpg" alt="Git"></a>

<h2>Contact Form</h2>
<form action="submit_data.php" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
  </div>

  <div class="form-group">
    <label for="mobile">Mobile Number:</label>
    <input type="tel" id="mobile" name="mobile" required>
  </div>

  <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="inquiry_type">Inquiry Type:</label>
    <select id="inquiry_type" name="inquiry_type">
      <option value="job_application">Job Application</option>
      <option value="general_inquiry">General Inquiry</option>
      <option value="other">Other</option>
    </select>
  </div>

  <button type="submit">Submit</button>
</form>
<h2>Find me@</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d453.29295968161216!2d78.3242167605666!3d17.429370399037097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1729021914521!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</body>
</html>