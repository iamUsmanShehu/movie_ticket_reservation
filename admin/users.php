<?php 
session_start(); 
include "counter.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
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

            <?php

            $per_page = 10;
            $pages_query = mysqli_query($db, "SELECT COUNT(id) AS count FROM users_tbl");
            $row = mysqli_fetch_assoc($pages_query);
            $total_rows = $row['count'];
            $pages = ceil($total_rows / $per_page);
            
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            
            $query = mysqli_query($db, "SELECT * FROM users_tbl ORDER BY id DESC LIMIT $start, $per_page");
            
        echo "<div class='container card' style='padding:20px;'>


                                    <h3 class='fs-4 mb-3'>Registered Users</h3><hr>
            <table class='table table-hover '>
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Password</th>
                  </tr>
                </thead>";

        while($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $surname = $row['surname'];
            $fname = $row['fname'];
            $email = $row['email'];
            $password = $row['password'];
            
            echo "<tr>
            <td><i class='fa fa-user'></i> $surname $fname</td><td><i class='fa fa-envelope'></i> $email</td><td>$password</td></tr>";  
        }

        echo "</table>";

        $prev = $page - 1;
        $next = $page + 1;

        echo "<center>";

        if($page > 1){
            echo "<a href='registered.php?page=$prev'>Prev</a> ";
        }

        if($pages >= 1 && $page <= $pages){
            for($x = 1; $x <= $pages; $x++){
                echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
            }
        }

        if($page < $pages){
            echo "<a href='registered.php?page=$next'>Next</a>";
        }
            
        echo "</center>";

        mysqli_close($db);
        ?>
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