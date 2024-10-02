<?php 
session_start(); 
include "counter.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user details from session
// $fname = $_SESSION['fname'];
$username = $_SESSION['username'];
// $email = $_SESSION['email'];
// Create database connection
$db = mysqli_connect("localhost", "root", "", "movie_reservation_system");

if (isset($_GET['update_data'])) {
    // Get data from the form
    $title = $_GET["title"];
    $description = $_GET["description"];
    $viewTime = $_GET["viewTime"];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "../images/" . basename($image);

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Update data in the database
            $sql = "UPDATE `movies` SET `title`='$title', `description`='$description', `viewTime`='$viewTime', `image`='$image' WHERE id = {$_GET['edit_id']}";
            if (mysqli_query($db, $sql)) {
                echo "Successful <br> Data Updated ";
                header("refresh:2; url=dashboard.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($db);
            }
        } else {
            echo "Failed to upload image.";
        }
    }
} elseif (isset($_POST['update'])) {
    // Get data from the form
    $title = $_POST["title"];
    $description = $_POST["description"];
    $viewTime = $_POST["viewTime"];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "../images/" . basename($image);

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert data into the database
            $sql = "INSERT INTO movies (title, description, viewTime, image) VALUES ('$title', '$description', '$viewTime', '$image')";
            if (mysqli_query($db, $sql)) {
                echo "Successful <br> Data Inserted!";
                header("refresh:2; url=index.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($db);
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image not provided or upload error.";
    }
}

$sql = "
SELECT 
    t.id AS ticket_id, 
    t.seat_no, 
    t.block, 
    t.purchase_time, 
    t.number, 
    u.fname, 
    u.surname, 
    u.email 
FROM 
    tickets t
JOIN 
    users_tbl u ON t.user_id = u.id
WHERE 
    1
";

$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="admin.css" />
    <title>Online Movie Ticket Reservation System</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'adminsidebar.php';?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($username); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$total_movies?></h3>
                                <p class="fs-5">Total Movies</p>
                            </div>
                            <i class="fas fa-film fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$total_tickets?></h3>
                                <p class="fs-5">Reserved Tickets</p>
                            </div>
                            <i
                                class="fas fa-ticket-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$revenue?></h3>
                                <p class="fs-5">Revenue</p>
                            </div>
                            <i class="fas fa-cash fs-1 primary-text border rounded-full secondary-bg p-3">&#8358;</i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$total_users?></h3>
                                <p class="fs-5">Registered Users</p>
                            </div>
                            <i class="fas fa-registered fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <h3 class="fs-4 mb-3">Movies</h3>
                            <tbody>
                            
                                <?php
                                    while ($total = $movie_result->fetch_assoc()) {
                                        $id = $total['id'];
                                        $movies_title = htmlspecialchars($total['title']);
                                        $viewTime = htmlspecialchars($total['viewTime']);
                                        $image = htmlspecialchars($total['image']);
                                        $image = "<img src='../images/$image' width='50'>";
                                        echo "<tr>
                                            <td>$movies_title</td>
                                            <td>$viewTime</td>
                                            <td>$image</td>
                                            <td><a href='viewMovie.php?id=$id'class='btn btn-info'><i class='fas fa-eye'></i></a></td>
                                        </tr>";
                                    } 
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                            <h3 class="fs-4 mb-3">Add New Movie</h3>
                        <div class="card" style="padding: 20px;">
                         <form id="product_form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" required value="<?php if (isset($_GET['edit_id'])) echo htmlspecialchars($_GET['title']); ?>">
                                    <label>Thumbnail</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div> 
                                <div class="col-md-6">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required><?php if (isset($_GET['edit_id'])) echo htmlspecialchars($_GET['description']); ?></textarea>     
                                </div>
                            </div>
                                <div class="row">
                                  <div class="form-group col-md-12">
                                      <label>View Time</label>
                                      <input type="date" class="form-control" name="viewTime" required value="<?php if (isset($_GET['edit_id'])) echo htmlspecialchars($_GET['viewTime']); ?>">
                                    </div>
                                </div>  
                                
                                <div style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-success" name="update">Post</button>
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                        </form>
                    </div>
                    </div>
                </div>



                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Purchase Tickets</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Dan Kallo</th>
                                    <th scope="col">Seat(No)</th>
                                    <th scope="col">Block</th>
                                    <th scope="col">Purchase Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        $i = 0;
                                        while($row = $result->fetch_assoc()) {
                                            $i++;
                                            echo "<tr>
                                                <td>$i</td>
                                                <td>{$row['fname']} . {$row['surname']}</td>
                                                <td>{$row['seat_no']}</td>
                                                <td>{$row['block']}</td>
                                                <td>{$row['purchase_time']}</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No records found</td></tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>