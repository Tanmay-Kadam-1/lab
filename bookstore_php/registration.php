<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="./assets/registration.css">
    <link rel='icon' type='image/png' href='https://s2.googleusercontent.com/s2/favicons?domain=www.thriftbooks.com'>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Registration</h1>
            <form action="" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <label for="address">Address:</label>
                <textarea name="address" required cols="45"></textarea>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = $_POST["address"];
    
        // Sanitize the form data
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $address = filter_var($address, FILTER_SANITIZE_STRING);
    
        // Validate the form data
        if (empty($name) || empty($email) || empty($password) || empty($address)) {
            echo "<script>alert('All fields are required.');</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address');</script>";
        } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',$password)) {
            echo "<script>alert('Password must be at least 8 characters long and contain at least one letter and one number.');</script>";
        } else {
            // Insert the user data into the database
            $sql = "INSERT INTO user_table (name, email, password, adddress) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $password, $address);
            $stmt->execute();
    
            // Check if the user is created
            if ($stmt->affected_rows > 0) {
                echo "<script>alert('User registration successfully.');</script>";
            } else {
                echo "<script>alert('Error in Registration.');</script>";
            }
    
            // Close statement
            $stmt->close();
        }
    
        // Close connection
        $conn->close();
    }
    
    ?>

</body>

</html>