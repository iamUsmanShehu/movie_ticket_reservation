
<head>
		<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css" />
        <script src="../css/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <script type="text/javascript" src="../css/bootstrap.js"></script>
        <meta charset="utf-8" >
</head>
<style>
	hr{
		width:20%;
	}
	@media print {
		body *{
			visibility: hidden;
		}
		.printarea *{
			font-size: 30px;
			visibility: visible;
		}
		.small{color:#8c928c; font-size:30px;}
		.visibility{display: all;}.btn{display: none;}
	}
	.btn-primary {
    color: #fff!important;
    background-color: #ffca4f;
    border-color: #ffca4f;
}
	.small{color:#8c928c; font-size:11px;}
	.visibility{display: none;}

</style>
<?php
session_start(); 
$surname = $_POST["surname"];
$fname = $_POST["fname"];
$email = $_POST["email"];
$freinds = $_POST["freinds"];
$reservetime = $_POST["reservetime"];
$date=date("F d, Y, g: i a");
$id = $_SESSION['id'];
include_once("conn.php");
mysqli_query($db, "INSERT INTO watchers(surname,fname,email,freinds,reservetime) values('$surname','$fname','$email','$freinds','$reservetime')");

header("refresh:2; url='PaymentCard.php?id=$id'");
// echo "<div class='printarea'> <center> 
// <br><p>
// <br><p>
// <br><p>
// <b>";
// echo "<div > <img src='../images/football.png' width='100' hieght='100'><br />";
// echo $_REQUEST['fname']; echo" ";
// echo $_REQUEST['surname']; echo",";

// echo"</b> &nbsp Your Seat Successfully Reserved <br><b>Match Time: </b>";
// if (!empty($freinds)) {
// 	echo $reservetime;
// 	echo "<br><b>Match Fee:</b> &nbsp &nbsp &#8358 100";
// }

// echo "</center>";


// ?>


	
<?php
// include_once("conn.php");
// $per_page = 10;
// 	$pages_query = mysql_query("SELECT COUNT('id') FROM stadium_tbl");
// 	$pages = ceil(mysql_result($pages_query, 0) / $per_page);
	
// 	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
// 	$start = ($page - 1) * $per_page;
	
// 	$query = mysql_query("SELECT * FROM stadium_tbl ORDER BY `id` DESC LIMIT $start, $per_page");
	



// $row=mysql_fetch_assoc($query);

// 	$id=$row['id'];
// 	$freinds = $_REQUEST['freinds'];
	
	
// echo "<div class='container'>";	


// echo "<div class='visibility'> <img src='../images/football.png' width='100' hieght='100'><br />";
// echo $_REQUEST['fname']; echo" ";
// echo $_REQUEST['surname']; echo",";
// echo"</b> &nbsp Your Seat Successfully Reserved $freinds<br>";
// echo("</div>");

// echo "<center><b style='font-size:20px;' class='badge badge-success'>Seat Number";
// echo (" &nbsp <span style='font-size:24px;'class='badge badge-light'>$id</span>");	


// echo "</b><br>$date";



// echo "<b>";echo "<hr />";
// echo ("3000");
// echo "</b>";	
// echo "&nbsp &nbsp &nbsp <span class='small' >Complete Seats</span>";
// echo "<hr />";

// echo "<b>";
// echo ("$id" - 1);
// echo "</b> </i>";	
// echo "&nbsp &nbsp &nbsp <span class='small' >Seats Occupied</span>";
// echo "<hr />";

// echo "<b>";
// echo (3000 - $id);
// echo "</b>";	
// echo "&nbsp &nbsp &nbsp <span class='small' >Seats Available</span>";
// echo "<hr />";


// echo "</div>";
// echo "</center></table><center>";
// echo "<a class='btn btn-info' href='../index.php'><< Back to Home</a> &nbsp <a class='btn btn-primary' onClick='window.print();' >Print Reciept</a></center>";

// $prev = $page - 1;
// $next = $page + 1;

// echo "</center>";

// if(!($page<=1)){
// 	echo "<a href='.php?page=$prev'>Prev</a> ";
// }

// if($pages>=1 && $page<=$pages){

// 	for($x=1;$x<=$pages;$x++){
		
// 	}

// }

// if(!($page>=$pages)){
	
// }
	
// 	mysql_close();

// ?>