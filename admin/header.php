
<?php 
	mysqli_connect("localhost", "root", "", "movie_reservation_system");
	 session_start();
if (!isset($_SESSION['password'])) {
	echo "No Session Found!";
	header("refresh:2; url='login.php'");
	exit();
}
?>
<!DOCTYPE html>

<html>

<head>
		<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css" />
        <script src="../css/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <script type="text/javascript" src="../css/bootstrap.js"></script>
</head>

<body>


		<!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-3" style="background-color:#007bff;">
		    <h5 class="my-0 mr-md-auto font-weight-normal" style="color:white!important;font-weight: bold;">
		        <a href=""><img src="../images/icon.png" style="width:100px !important;height: 70px;" /></a>
		    </h5>
	  	</div> -->
	   <center class='jumbotron'>
	   	<h1>ADMIN-<?php echo $_SESSION['username']; ?></h1></center> 
		<a class="btn btn-outline-danger" href="logout.php"><i class="fa fa-lock"> Logout</i></a>
</body>


</html>