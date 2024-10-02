<?php
// Start session
session_start();

// Database connection
$db = mysqli_connect("localhost", "root", "", "movie_reservation_system");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password'];

    // Validate input
    if (!empty($username) && !empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the username already exists
        $checkQuery = mysqli_prepare($db, "SELECT * FROM newuser_tbl WHERE username = ?");
        mysqli_stmt_bind_param($checkQuery, 's', $username);
        mysqli_stmt_execute($checkQuery);
        $result = mysqli_stmt_get_result($checkQuery);

        if (mysqli_num_rows($result) == 0) {
            // Prepare and execute the insert query
            $insertQuery = mysqli_prepare($db, "INSERT INTO newuser_tbl (username, password) VALUES (?, ?)");
            mysqli_stmt_bind_param($insertQuery, 'ss', $username, $hashedPassword);

            if (mysqli_stmt_execute($insertQuery)) {
                // Registration successful
                $_SESSION['success_message'] = "User registered successfully!";
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($db);
            }
        } else {
            echo "Username already exists. Please choose another.";
        }

        // Close the prepared statement
        mysqli_stmt_close($checkQuery);
        mysqli_stmt_close($insertQuery);
    } else {
        echo "Please fill in all fields.";
    }
}

// Close the database connection
mysqli_close($db);
?>
