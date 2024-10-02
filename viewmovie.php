<?php 
session_start(); $id = $_GET['id'];
include "counter.php";
if (isset($_GET['id'])) {
    
   
    $movie_desc_request = "SELECT `id`, `title`, `description`, `viewTime`, `image` FROM `movies` WHERE id = ".$id."";
    $movie_desc_stmt = $db->prepare($movie_desc_request);
    $movie_desc_stmt->execute();
    $movie_desc_result = $movie_desc_stmt->get_result();
     }
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Online Movie Ticket Reservation System</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="dashboadcss.css">
<style type="text/css">
  input, select{padding: 16px 32px; border-radius: 20px; border: 1px solid #eee;margin-bottom: 10px; width: 100%;}
  form{padding: 20px; background: #eee; border-radius: 20px;}
  table{width: 100%;}
  .td{width: 50%;}
  .card{width:100%;}
  .tickets_card{
    width:95%;
    background:#131a20;
    /*color: white;*/
    padding: 40px;
    margin-top: -100px;
    border-radius: 10px;
  }
  .tickets_c{
    width: 35%;
    background:#eee;
    /*color: white;*/
    border-radius: 10px;
    padding-right: 10px;
  }
  .bodyCard
  	{
    width: 100%;
     /*height: 300px; */
    padding: 10px 10px 30px 10px;
    margin-top: 10px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
  }
  .btn{
  	padding: 16px 32px!important;
  	color: #fff;
  	margin-bottom: 20px!important;
  }

  .btn-warning{
  	background: orange!important;
  }

  .btn-danger{ 
  	background: maroon!important;
  }
  .card-body table{
  	color: #fff!important;
  }
  .movie_content{
  	padding: 30px!important;
  }
</style>
</head>
<body>
  <div class="contain">
   <?php //include 'counter.php'; ?>

    <section class="main">
      <br><p></p>
      <div class="bodyCard">
      	<div class="containe">
      	<div class="col-md-12">
					<h4 class="card-title">Overview</h4>
    			<div class="card" style="opacity:0.80;">
    				<div class="card-body">
    					<table>
    						<?php
    							while ($total = $movie_desc_result->fetch_assoc()) {
    		        				$id = $total['id'];
    						        $movies_title = $total['title'];
    						        $description = $total['description'];
    						        $viewTime = $total['viewTime'];
    						        $image = $total['image'];
    						        $image = "<img src='../images/$image' width='400'>";
    								echo "<tr>
    										<td>$image</td>
    										<td class='movie_content'>
    											<h1 class='btn-warning'>$movies_title</h1>
    											<h3>$viewTime</h3>
    											<span>$description</span>
    										</td>
    										</td>
    										<tr>
                      <td><br><p><a href='login.php' class='btn btn-warning'>Watch</a>&nbsp <a href='index.php' class='btn btn-default'>Back</a></td>
                    </tr>
                    
    									</tr>";
    						    } 
    								// <td>$description</td>
    						?>
    						
    					</table>
				   	</div>
			    </div>
        </div>
			 </div>
      </div>
      			
      	
      </div>

      </section>
    </section>
  </div>
</body>
</html></span>


