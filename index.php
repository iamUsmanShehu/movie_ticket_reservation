
<?php 
	$db = mysqli_connect("localhost", "root", "", "movie_reservation_system"); 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Online Movie Ticket Reservation System</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
<style type="text/css">
.btn{
	background-color: orange;
	color:white;
	display: inline-block;
	font-weight: 400;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	border: 1px solid transparent;
	padding: 0.375rem 0.75rem;
	font-size: 1rem;
	line-height: 1.5;
	border-radius: 0.25rem;
	transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
    </style>
    <!-- End WOWSlider.com HEAD section -->
    <script>
        function toggleText(id) {
            var fullText = document.getElementById('fullText_' + id);
            var truncatedText = document.getElementById('truncatedText_' + id);
            var toggleLink = document.getElementById('toggleLink_' + id);
            if (fullText.style.display === 'none') {
                fullText.style.display = 'inline';
                truncatedText.style.display = 'none';
                toggleLink.innerText = 'Read less';
            } else {
                fullText.style.display = 'none';
                truncatedText.style.display = 'inline';
                toggleLink.innerText = 'Read more';
            }
        }
    </script>
	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<?php include 'header.php'; ?>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
							<div class="col-md-9">
								<div class="slider">
									<ul class="slides">
										<li><a href="#"><img src="dummy/img6.jpg" alt="Slide 2"></a></li>
										<li><a href="#"><img src="dummy/img7.jpg" alt="Slide 1"></a></li>
										<li><a href="#"><img src="dummy/img3.webp" alt="Slide 3"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="dummy/img6.jpg" alt="Movie 1"></a>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="dummy/img1.jpg" alt="Movie 2"></a>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="dummy/img5.webp" alt="Movie 2"></a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .row -->
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/img4.webp" alt="Movie 3"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/img3.webp" alt="Movie 4"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/img2.webp" alt="Movie 5"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="dummy/img7.jpg" alt="Movie 6"></a>
								</div>
							</div>
						</div> <!-- .row -->
						
						<?php include 'movieCard.php';?>
					</div>
				</div> <!-- .container -->
			</main>
			<footer class="site-footer">
				<?php include 'footer.php'; ?>
			</footer>
		</div>
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>