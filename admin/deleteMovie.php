<?php
// Start session
session_start();

// Database connection
$db = mysqli_connect("localhost", "root", "", "movie_reservation_system");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $movieId = $_GET['id'];

    // Validate the ID (make sure it's a number)
    if (is_numeric($movieId)) {
        // Prepare and execute the delete query
        $deleteQuery = mysqli_prepare($db, "DELETE FROM movies WHERE id = ?");
        mysqli_stmt_bind_param($deleteQuery, 'i', $movieId);

        if (mysqli_stmt_execute($deleteQuery)) {
            // Successfully deleted
            $_SESSION['message'] = "Movie deleted successfully!";
        } else {
            $_SESSION['message'] = "Error deleting movie: " . mysqli_error($db);
        }

        // Close the prepared statement
        mysqli_stmt_close($deleteQuery);
    } else {
        $_SESSION['message'] = "Invalid movie ID.";
    }
} else {
    $_SESSION['message'] = "No movie ID specified.";
}

// Close the database connection
mysqli_close($db);

// Redirect back to viewMovie.php
header("Location: index.php");
exit();
?>
