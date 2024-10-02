<?php session_start(); ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css" />
        <script src="css/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">






<style type="text/css">
	body{color:white;}
	p{margin-bottom: 0;}
	.container{
		display: grid;
		place-items: center;
		margin-top: 50px;
    	background-image: url(images/ticket.jpg);
    	background-size: cover
	}
	.purchase_times{margin-top:25px;margin-left:65%;}
	.fullname{margin-top:98px;margin-left:59%;}
	.block{margin-top:43px;margin-left:65%;}
	.seat{margin-top:10px;margin-left:80%;}

	/*for user*/
	.userpurchase_times{margin-top:-25px;margin-left:-60%;}
	/*.userfullname{margin-top:-10px;margin-left:0%;}*/
	.userblock{margin-top:18px;margin-left:-23%;}
	.userseat{margin-top:-26px;margin-left:13%;}

	@media print{
		button{
			visibility: hidden;
		}
		
		p{margin-bottom: 0;}
		.container{
			display: grid;
			place-items: center;
			margin-top: 50px;    
			background-image: url("images/ticket.jpg");
	    	background-size: cover;
		}
	}
</style>
<div class="container">
  
  
    <h5 class="fullname"><?php echo $_SESSION['fname']. ' ' . $_SESSION['surname']; ?></h5>

	    <font class="block"><b></b><?php echo $_REQUEST['blocks'];?></font>
	    <font class="seat"><b> </b><?php echo $_REQUEST['seat_nos'];?></font>
	<font class="purchase_times">Date: <?php echo $_REQUEST['purchase_times'];?></font>


	    <!-- <h5 class="userfullname"><?php echo $_SESSION['fname']. ' ' . $_SESSION['surname']; ?></h5> -->
	    <font class="userblock"><b></b><?php echo $_REQUEST['blocks'];?></font>
	    <font class="userseat"><b></b><?php echo $_REQUEST['seat_nos'];?></font>
		<font class="userpurchase_times">Date: <?php echo $_REQUEST['purchase_times'];?></font>

 	<!-- <center><div class="Verify">Verify-> <b><?php echo $_REQUEST['numbers'];?></b></div></center> -->
 </div>
 
</div>
<center><button style="margin-top: 20px;" class="btn" onclick="print()">Print</button></center>
</div>