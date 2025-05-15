<?php
// Database connection setup
$host = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP has no password
$database = "e_learning"; // Replace with your actual DB name

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form values
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $role = $_POST["role"];

    // Simple password confirmation check
    if ($password !== $confirm_password) {
        echo "Password and Confirm Password do not match!";
        exit;
    }

    // SQL Insert Query
    $sql = "INSERT INTO sign_up (full_name, email, password, confirm_password, role)
            VALUES ('$full_name', '$email', '$password', '$confirm_password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
