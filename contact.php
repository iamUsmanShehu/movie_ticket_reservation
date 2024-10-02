<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Contact</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

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
							<span>Contact</span>
						</div>

						<div class="content">
							<div class="row">
								<div class="col-md-4">
									<h2>Contact</h2>
									<ul class="contact-detail">
										<li>
											<img src="images/icon-contact-map.png" alt="#">
											<address><span>Film House Cinema, Ado Bayero Mall, Kano</span> <br></address>
										</li>
										<li>
											<img src="images/icon-contact-phone.png" alt="">
											<a href="tel:1590912831">+2348135151444</a>
										</li>
										<li>
											<img src="images/icon-contact-message.png" alt="">
											<a href="mailto:contact@companyname.com">musaabdullahi@gmail.com</a>
										</li>
									</ul>
									
								</div>
								<div class="col-md-7 col-md-offset-1">
									<div class="map"></div>
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
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>