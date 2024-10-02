<?php 
session_start(); $id = $_GET['id'];
include "counter.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
if (isset($_GET['id'])) {
    
   
    $movie_desc_request = "SELECT `id`, `title`, `description`, `viewTime`, `image` FROM `movies` WHERE id = ".$id."";
    $movie_desc_stmt = $db->prepare($movie_desc_request);
    $movie_desc_stmt->execute();
    $movie_desc_result = $movie_desc_stmt->get_result();
     }

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
                    <h2 class="fs-2 m-0">Overview</h2>
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
                                <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['username']); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
             <div class="container"> 

                <div class="row">
                  
                    <?php
                        while ($total = $movie_desc_result->fetch_assoc()) {
                              $id = $total['id'];
                              $movies_title = $total['title'];
                              $description = $total['description'];
                              $viewTime = $total['viewTime'];
                              $image = $total['image'];
                              $image = "<img src='../images/$image' width='400'>";
                          echo "<div class='col-md-4'>
                                  $image
                                </div>
                                <div class='col-md-8'>
                                <h1 class='btn-warning'>$movies_title</h1>
                                <h3>$viewTime</h3>
                                <span>$description</span>
                             
                              <tr>
                                <td><br><p><a href='index.php?edit_id=$id&&update_data=$id&&title=$movies_title&&viewTime=$viewTime&&description=$description' class='btn btn-warning'>Edit</a>&nbsp <a href='' onclick='confirmDelete($id)' class='btn btn-danger'>Dtelete Post</a></td>
                              </tr>
                                
                              </div>";
                          } 
                          // <td>$description</td>
                      ?>
                  
                   
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

        function confirmDelete(movieId) {
            var confirmation = confirm("Are you sure you want to delete this movie?");
            if (confirmation) {
                // Redirect to the delete script with the movie ID
                window.location.href = "deleteMovie.php?id=" + movieId;
            }
        }
</script>
</body>

</html>