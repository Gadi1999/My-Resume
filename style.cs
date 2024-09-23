/* Reset styles for consistent baseline */
body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}

/* Container for overall layout */
.container {
  width: 80%;
  max-width: 700px;
  margin: 0 auto;
  padding: 2rem;
  border-radius: 5px;
  background-color: #f5f5f5;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Header section */
header {
  text-align: center;
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 0.5rem;
}

h2 {
  font-size: 1.8rem;
  margin-bottom: 1rem;
}

p {
  font-size: 1rem;
  line-height: 1.5;
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
}

/* Contact form styling */
form {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-top: 2rem;
}

label {
  flex: 1 0 20%;
  font-weight: bold;
  margin-bottom: 0.5rem;
  text-align: right;
}

input[type="text"],
input[type="tel"],
input[type="email"] {
  flex: 1 0 80%;
  padding: 0.7rem;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button[type="submit"] {
  background-color: #333;
  color: white;
  padding: 0.7rem 1.5rem;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #222;
}

/* LinkedIn icon image */
.linkedin img {
  width: 30px;
  height: 30px;
  margin-left: 10px;
}
