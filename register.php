<?php 
$db = mysqli_connect("localhost", "root", "", "movie_reservation_system");

if (isset($_POST["password"])) { 
    session_start();
    if ($_POST) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $message = [];
        if ($_SESSION['email'] && $_SESSION['password']) {
            $query = mysqli_query($db, "SELECT * FROM users_tbl WHERE email = '".$_SESSION['email']."'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['surname'] = $row['surname'];
                    $_SESSION['email'] = $row['email'];
                    $id = $_SESSION['id'] = $row['id'];
                }
                if ($_SESSION['email'] == $dbemail) {
                    if ($_SESSION['password'] == $dbpassword) {
                        $message = "<font class='alert alert-success'>You have login successfully</font>";
                        header("refresh:2; url='researve.php'");
                    } else { 
                        $message = "<font class='alert alert-danger'>Your password is incorrect!</font>";
                    }
                } else {
                    $message = "<font class='alert alert-danger'>Your email is incorrect!</font>";
                }
            } else {
                $message = "<font class='alert alert-danger'>Invalid email!</font>";
            }
        } else {
            $message = "<font class='alert alert-danger'>Can't submit empty fields</font>";
        }
    } else {
        echo "Access Denied!";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Review</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="style.css">
		<style type="text/css">
			.card{
				border-radius: 10px;
				background: #ffff;
				box-shadow:  6px -6px 12px #bebebe, -6px 6px 12px #ffffff;
				padding: 20px;
			}
			.form-control{margin-bottom: 10px; width: 100%;}
		</style>

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<?php include 'header.php'; ?>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="index.html">Home</a>
							<span>Register</span>
						</div>
					<div class="row">
			        <div class="col-md-8"></div>
					        

					<div class="col-md-4">
									<div class="card" style="opacity:0.80;">
											<div class="card-body">
											<h4 class="card-title">Register</h4>
											
											   </div>
											   <div class="form-body" style="margin:15px;" >
												 <form id="product_form" method="POST" action="admin/insertusers.php">
												   <div class="form-row" >
													   
													 <div class="form-group col-md-12">
													   <input type="text" class="form-control" name="surname" id="" placeholder="Surname" required>
					                                 </div>
					                                 <div class="form-group col-md-12">
				                                        <input type="text" class="form-control" name="fname" id="" placeholder="First Name" required>
				                                      </div>
					                                      
													 <div class="form-group col-md-12">
													   <input type="email" class="form-control" name="email" id="" placeholder="Email" required>
													 </div>
				                                      <div class="form-group col-md-12">
				                                       <input type="text" class="form-control" name="password" id="Password" placeholder="Password" required>
				                                      </div>
												   </div>
												   
												   <button type="submit" class="btn btn-success">Register</button>
												 </form>
												 <a href="login.php" class="pull-right">Signin</a>
											   </div>
											 
											 
											 </div></p>
										</div>
									</div>
								</div>
					    </div>
					</div>
				</div> <!-- .container -->
			</main>
			<footer class="site-footer">
				<div class="container">
				<?php include 'footer.php'; ?>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>