<?php 
session_start(); 
include "counter.php";

// Function to fetch match times
function getMatchTimes($db) {
    // SQL query to select match times
    $sql = "SELECT * FROM movies ORDER BY `id` DESC";
    $result = mysqli_query($db, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Iterate through each row and print match times
            while ($row = mysqli_fetch_assoc($result)) {
                $viewTime = htmlspecialchars($row['viewTime']); // Sanitize output
                echo "<option>$viewTime</option>";
            }
        } else {
            // No match times available
            echo "<option>No match times available</option>";
        }
    } else {
        // Handle SQL query error
        echo "<option>Error retrieving match times: " . mysqli_error($db) . "</option>";
    }
}


?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Online Movie Ticket Reservation System</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/dashboadcss.css">
<style type="text/css">
  input, select{padding: 16px 32px; border-radius: 20px; border: 1px solid #eee;margin-bottom: 10px; width: 100%;}
  form{width: 100%; padding: 20px; background: #eee; border-radius: 20px;}
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
</style>
</head>
<body>
  <div class="contain">
   <?php include 'sidebar.php'; ?>

    <section class="main">
      <div class="main-top">
        <h1><?=$_SESSION['fname'].' '.$_SESSION['surname']?></h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-"></i>
          <p> Watchers</p>
          <h3><?=$total_users?></h3>
        </div>
        <div class="card">
          <i class="fab fa-"></i>
          <p>Tickets</p>
          <h3><?=$total_tickets?> </h3>
        </div>
      </div>

      <section class="main-course">
        <div class="course-box">
          
          <div class="course">
           <div class="card" style="opacity:0.80;">
						<div class="card-body">
						  <h4 class="card-title">My RSVS</h4>
						</div>
						   <div class="form-body" style="margin:15px;" >
							 <table>
                <tr>
                  <td>
                    <div class="">
                <?php 
                    $user_id = $_SESSION['id'];
                      $db=mysqli_connect("localhost", "root", "", "movie_reservation_system");
                    $sql="SELECT * FROM tickets WHERE user_id = $user_id ORDER BY user_id DESC ";
                    $result=mysqli_query($db, $sql);
                    while ($row=mysqli_fetch_assoc($result)){
                        
                        
                        //$user_id=$row['user_id'];
                        $seat_no=$row['seat_no'];
                        $block=$row['block'];
                        $purchase_time=$row['purchase_time'];
                        $number=$row['number'];
                        $id=$row['id'];

                        echo "<div class='tickets_card'><a class='tickets_c' href=\"print.php?id=$id&seat_nos=$seat_no&blocks=$block&purchase_times=$purchase_time&numbers=$number\"> <div class='badge btn-outline-warning'>";
                        echo "<b>Seat No: </b>$seat_no <b>Block</b> $block  <br><font class='badge badge-info'>$purchase_time</font> ";
                         echo "</div></a></div><br><p>";
                        
                        
                    }

                  ?>
                </div>
                  </td>
                  <td class="td"  colspan="3">
                <form method="POST" action="insert.php">
                    <h4 class="card-title">Reservation Form</h4>

                    <label>Surname Name</label>
                    <input type="text" class="form-control" name="surname" value="<?=isset($_SESSION['surname']) ? htmlspecialchars($_SESSION['surname']) : ''; ?>" required><br>

                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" value="<?=isset($_SESSION['fname']) ? htmlspecialchars($_SESSION['fname']) : ''; ?>" required><br>

                    <label>Friends</label>
                    <select class="form-control" name="freinds">
                        <option value="0">............</option>
                        <option value="1">One(1)</option>
                        <option value="2">Two(2)</option>
                        <option value="3">Three(3)</option>
                        <option value="4">Four(4)</option>
                        <option value="5">Five(5)</option>
                    </select><br>

                    <label>Date/Time</label>
                    <select class="form-control" name="reservetime">
                        <!-- <option>............</option> -->
                          <?php getMatchTimes($db); ?>
                    </select><br>

                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required><br>

                    <button type="submit" class="btn btn-success">Reserve Ticket</button>
                </form>

                  </td>
                  </tr>       
               </table>

                  


		          </div></div></div>

          </div>
        </div>
      </section>
    </section>
  </div>
</body>
</html></span>