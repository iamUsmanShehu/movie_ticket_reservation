<?php 

	$db=mysqli_connect("localhost", "root", "", "movie_reservation_system");
	if (isset($_SESSION["fname"])) {
		$user_request_id = "SELECT COUNT(id) AS 'Total' FROM `users_tbl`";
	    $user_stmt = $db->prepare($user_request_id);
	    $user_stmt->execute();
	    $user_result = $user_stmt->get_result();
	    
	    if ($user_result->num_rows > 0) {
	        $total = $user_result->fetch_assoc();
	        $total_users = $total['Total'];
	    }


	    $user_id = $_SESSION["id"];
	    $ticket_request_id = "SELECT COUNT(id) AS 'Total_tickets' FROM `tickets` WHERE user_id=$user_id";
	    $ticket_stmt = $db->prepare($ticket_request_id);
	    $ticket_stmt->execute();
	    $ticket_result = $ticket_stmt->get_result();
	    
	    if ($ticket_result->num_rows > 0) {
	        $total = $ticket_result->fetch_assoc();
	        $total_tickets = $total['Total_tickets'];
	    }
	}