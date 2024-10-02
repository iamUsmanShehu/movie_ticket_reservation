<?php
// Check if the form is submitted
if (isset($_POST['post'])) {
    // Create database connection
$db=mysqli_connect("localhost", "root", "", "movie_reservation_system");

    // Get data from the form
    $clubName = $_POST["clubName"];
    $club2 = $_POST["club2"];
    $matchTime = $_POST["matchTime"];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "../up_images/" . basename($image);

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert data into the database
            $sql = "INSERT INTO match_tbl (image, clubName, club2, matchTime) VALUES ('$image', '$clubName', '$club2', '$matchTime')";
            if (mysqli_query($db, $sql)) {
                echo "Successful";
                header("refresh:2; url=../admin/form.php");
            } else {
                echo "Error: " . mysqli_error($db);
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image not provided or upload error.";
    }

    // Close the database connection
    mysqli_close($db);
}
?>
