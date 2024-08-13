<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create (Insert)
$name = 'John Doe';
$email = 'john@example.com';
$password = 'password123';
$sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: $sql<br>" . $conn->error;
}

// Read (Select)
$sql = "SELECT id, name, email FROM user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']} - Name: {$row['name']} - Email: {$row['email']}<br>";
    }
} else {
    echo "0 results";
}

// Update
$newName = 'newname';
$idToUpdate = 1;
$sql = "UPDATE user SET name='$newName' WHERE id=$idToUpdate";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
} else {
    echo "Error updating record: " . $conn->error;
}

// Delete
$idToDelete = 1;
$sql = "DELETE FROM user WHERE id=$idToDelete";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connection
$conn->close();
?>