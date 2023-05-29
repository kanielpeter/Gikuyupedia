<?php
// Database connection configuration
$servername = "localhost";
$username = "Nelsonp";
$password = "Pascaline_1";
$dbname = "gikuyupedia";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission handling
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect the user to index.html after successful login
        header("Location: ../home.html");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}

// Close the database connection
$conn->close();
?>
