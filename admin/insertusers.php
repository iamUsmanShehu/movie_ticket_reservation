<?php
$fname = $_POST['fname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Create a connection to the database using mysqli
$db=mysqli_connect("localhost", "root", "", "movie_reservation_system");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the user data into the users_tbl table
$sql = "INSERT INTO users_tbl (fname, surname, email, password) VALUES ('$fname', '$surname', '$email', '$password')";
if (mysqli_query($db, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

// Close the database connection
mysqli_close($db);

// Redirect to index.php after 2 seconds
header("refresh:2; url='../index.php'");
?>
