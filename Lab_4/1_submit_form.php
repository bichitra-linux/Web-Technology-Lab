<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validation
    if (strlen($fullname) > 40) {
        echo "Full name cannot exceed 40 characters.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif (!preg_match("/^[a-zA-Z]+\d+$/", $username)) {
        echo "Username must start with a string followed by a number.";
    } elseif (strlen($password) < 8) {
        echo "Password must be more than eight characters.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL Insert
        $sql = "INSERT INTO user (name, email, username, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);
        $stmt->execute();
        echo "Record successfully inserted!";
    }
}
?>