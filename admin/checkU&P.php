<?php
// Database connection
$db = mysqli_connect("localhost", "root", "", "movie_reservation_system");
session_start();

if ($_POST) {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are provided
    if (!empty($username) && !empty($password)) {
        // Prepare and execute the query to prevent SQL injection
        $query = mysqli_prepare($db, "SELECT id, username, password FROM newuser_tbl WHERE username = ?");
        mysqli_stmt_bind_param($query, 's', $username);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        
        // Check if the user exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);
            $dbusername = $row['username'];
            $dbpassword = $row['password']; // Assuming this is hashed in the database
            
            // Verify password (assuming passwords are hashed)
            if (password_verify($password, $dbpassword)) {
                // Set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                // $_SESSION['email'] = $row['email'];

                echo "You are in!";
                header("Location: index.php");
                exit(); // Always exit after header redirect
            } else {
                echo "Your password is incorrect!";
            }
        } else {
            echo "Invalid Username!";
        }
    } else {
        echo "You have to type a Username and Password!";
    }
} else {
    echo "Access Denied!";
    exit;
}

// Close database connection
mysqli_close($db);
?>
