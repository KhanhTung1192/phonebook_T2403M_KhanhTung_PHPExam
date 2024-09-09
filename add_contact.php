<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize user inputs
    $name = trim($_POST['name']);
    $phone_number = trim($_POST['phone_number']);

    // Validate input
    if (!empty($name) && !empty($phone_number)) {
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $mysqli->prepare("INSERT INTO contacts_table (name, phone_number) VALUES (?, ?)");

        // Bind parameters
        $stmt->bind_param("ss", $name, $phone_number);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New contact added successfully.";
        } else {
            echo "Error: Could not add contact.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Please fill in both fields.";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
</head>

<body>
    <h1>Add Contact</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Phone Number:</label><br>
        <input type="text" name="phone_number" required><br><br>
        <button type="submit">Add</button>
    </form>
</body>

</html>