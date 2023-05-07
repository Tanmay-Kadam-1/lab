<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./assets/login.css">
    <link rel='icon' type='image/png' href='https://s2.googleusercontent.com/s2/favicons?domain=www.thriftbooks.com'>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Login</h1>
            <form action="" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required placeholder="Enter your Email">
                <label for="password">Password:</label>
                <input type="password" name="password" required placeholder="Enter your password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <?php
    session_start();

    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get user input from login form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Validate email using regex
        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            // Invalid email format
            $error_msg = "Invalid email format";
            echo "<script>var errorMsg = '$error_msg'; alert(errorMsg);</script>";
            exit();
        }

        // Validate password using regex
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
            // Invalid password format
            $error_msg = "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, and one number";
            echo "<script>var errorMsg = '$error_msg'; alert(errorMsg);</script>";
            exit();
        }

        // Prepare SQL statement to select user with matching email and password
        $stmt = $conn->prepare("SELECT user_id, name FROM user_table WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        // Fetch result
        $result = $stmt->get_result();

        // Check if a user was found
        if ($result->num_rows == 1) {
            // User found, log them in
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];

            // Redirect to home page or another page
            header("Location: index.php");
            exit();
            echo "<script>alert('Login successful');</script>";
        } else {
            // Invalid email or password
            $error_msg = "Invalid email or password";
            echo "<script>var errorMsg = '$error_msg'; alert(errorMsg);</script>";
        }

        // Close database connection
        $conn->close();
    }

    ?>

</body>

</html>