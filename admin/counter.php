<?php 

	$db=mysqli_connect("localhost", "root", "", "movie_reservation_system");
	if (isset($_SESSION["password"])) {
		$user_request_id = "SELECT COUNT(id) AS 'Total' FROM `users_tbl`";
	    $user_stmt = $db->prepare($user_request_id);
	    $user_stmt->execute();
	    $user_result = $user_stmt->get_result();
	    
	    if ($user_result->num_rows > 0) {
	        $total = $user_result->fetch_assoc();
	        $total_users = $total['Total'];
	    }


	    // $user_id = $_SESSION["id"];
	    $ticket_request_id = "SELECT COUNT(id) AS 'Total_tickets' FROM `tickets`";
	    $ticket_stmt = $db->prepare($ticket_request_id);
	    $ticket_stmt->execute();
	    $ticket_result = $ticket_stmt->get_result();
	    
	    if ($ticket_result->num_rows > 0) {
	        $total = $ticket_result->fetch_assoc();
	        $total_tickets = $total['Total_tickets'];
	    }

	    $revenue = 200 * $total_tickets; 

	    $movie_request_id = "SELECT COUNT(id) AS 'Total_movies' FROM `movies`";
	    $movie_stmt = $db->prepare($movie_request_id);
	    $movie_stmt->execute();
	    $movie_result = $movie_stmt->get_result();
	    
	    if ($movie_result->num_rows > 0) {
	        $total = $movie_result->fetch_assoc();
	        $total_movies = $total['Total_movies'];
	    }

	    $admin_request_id = "SELECT COUNT(id) AS 'Total_admins' FROM `newuser_tbl`";
	    $admin_stmt = $db->prepare($admin_request_id);
	    $admin_stmt->execute();
	    $admin_result = $admin_stmt->get_result();
	    
	    if ($admin_result->num_rows > 0) {
	        $total = $admin_result->fetch_assoc();
	        $total_admins = $total['Total_admins'];
	    }

	   	$movie_request = "SELECT `id`, `title`, `description`, `viewTime`, `image` FROM `movies`";
	    $movie_stmt = $db->prepare($movie_request);
	    $movie_stmt->execute();
	    $movie_result = $movie_stmt->get_result();
	    
	    

	}else{
		// echo "You have to login<br> Dont try to bypass again!";
		header("refresh:0; url='login.php'");
	}