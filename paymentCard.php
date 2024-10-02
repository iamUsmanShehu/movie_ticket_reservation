<link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" />
   <style type="text/css">
     form{
      justify-content: center;
      display: flex;
      margin-top: 10%;
      
     }
     .panel-heading{
      color: #fff;
      background-color: #131a20;
      border-color: #131a20;
      padding: 10px;
     }
     .panel-body{
      border:1px solid #131a20;
      padding: 10px;
     }
   </style>
<?php 
session_start();
if(isset($_POST['payname'])){
  
  $cnumber = $_POST["cnumber"];
  $expiredate = $_POST["expiredate"];
  $cvv = $_POST["cvv"];
   $kudi = $_POST["kudi"];
   $payname = $_POST["payname"];
  $result =[];
  $id = $_SESSION['id'];
  //$tiketID = $_POST['tiketID'];
  

$db=mysqli_connect("localhost", "root", "", "movie_reservation_system");
   
 
                  $stadium_blocks = ['A', 'B', 'C'];
                  $stadium_block_seats = 3;

                  $result = mysqli_query($db, "SELECT * FROM `tickets` ORDER BY `purchase_time` DESC LIMIT 1");
                  $last_ticket = mysqli_fetch_assoc($result);
                  function random_token($length = 5) {
                    $key = '';
                    $keys = array_merge(range(0, 9), range('A', 'Z'));
                    for ($i = 0; $i < $length; $i ++) {
                      $key .= $keys[array_rand($keys)];
                    }
                    return $key;
                  }
                  $ticket_number = random_token(14);
                  if ($last_ticket) {
                    $LTB = $last_ticket['block'];
                    if ($last_ticket["seat_no"] < $stadium_block_seats) {
                      $new_ticket_seat_no = $last_ticket['seat_no'] + 1;
                      mysqli_query($db, "INSERT INTO `tickets`(`number`, `user_id`, `block`, `seat_no`) VALUES ('{$ticket_number}', {$id}, '{$LTB}', {$new_ticket_seat_no})");
                      header("refresh:2; url='loader.php'");
                    } else if ($last_ticket['block'] != end($stadium_blocks)) {
                      # reserve from next available block
                      $last_ticket_block_index = array_search($last_ticket['block'], $stadium_blocks);
                      $next_available_stadium_block = $stadium_blocks[$last_ticket_block_index + 1];
                      mysqli_query($db, "INSERT INTO `tickets`(`number`, `user_id`, `block`, `seat_no`) VALUES ('{$ticket_number}', {$id}, '{$next_available_stadium_block}', 1)");
                      header("refresh:2; url='loader.php'");
                    } else {
                      "All blocks are occupied";
                    }
                  } else { # no tickets exists - you are the first to purchase
                    $first_stadium_block = $stadium_blocks[0];
                    mysqli_query($db, "INSERT INTO `tickets`(`number`, `user_id`, `block`, `seat_no`) VALUES ('{$ticket_number}', {$id}, '{$first_stadium_block}', 1)");
                    header("refresh:2; url='loader.php'");
                  }
  //                 if($tiketID < 3)
  //                 {
  //                    mysqli_query($db, "INSERT INTO partb (payname, kudi, expiredate, cnumber, cvv, tiketID) VALUES ('$payname', '$kudi', '$expiredate', '$cnumber', '$cvv', '$tiketID')");
  //                    if ($payname && $id) {
  //                         # code...
  //                        mysqli_query($db, "INSERT INTO ticket_tbl (user_id) VALUES ('$id')");
                         
  //                       }
  //                     echo "<script>alert('Payment Successfully added to Part A $id');</script>";
  //                    // header("refresh:1; url='print.php'");
                  
  //                 }
  //                 else if($tiketID < 3)
  //                 {
  //                   mysqli_query($db, "INSERT INTO partb (payname, kudi, expiredate, cnumber, cvv, tiketID) VALUES ('$payname', '$kudi', '$expiredate', '$cnumber', '$cvv', '$tiketID')");
  //                   echo "<script>alert('Payment Successfully added to Part B');</script>";
  //                     header("refresh:1; url='print.php'");
                  
    
  //                 }
  //                 else if($tiketID < 3)
  //                 {
  //                    mysqli_query($db, "INSERT INTO partc (payname, kudi, expiredate, cnumber, cvv, tiketID) VALUES ('$payname', '$kudi', '$expiredate', '$cnumber', '$cvv', '$tiketID')");
  //                   echo "<script>alert('Payment Successfully added to Part C');</script>";
  //                     header("refresh:1; url='print.php'");
                  
    
  //                 }
  //                 else
  //                 {
  //                   echo "Exceeded the maximum number";
  //                 }
header("refresh:2; url='loader.php'");

  }else{
    $result = "Problem";
  }
 // $tiket = $_SESSION['tiketID'] + 1;
  ?>
<form method="POST" action="">
<div class="col-md-6 col-sm-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            CARD INFORMATION -<span style="text-transform: uppercase;"><b><?php echo $_SESSION['fname'].' '.$_SESSION['surname']; ?></b></span>
                        </div>
                        <div class="panel-body">
                                <input type="hidden" name="kudi" Value="34"> 
                                <input type="hidden" name="payname" Value="<?php echo $_SESSION['fname'].' '.$_SESSION['surname']; ?>"> 
                              <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="Number" name="cnumber" class="form-control" required>
                                                
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                            <label>Expire Date</label>
                                            <input type="text" name="expiredate" class="form-control" required>
                                              
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                            <label>CVV</label>
                                            <input type="number" name="cvv" class="form-control" required>
                                              
                                      </div>
                                  </div>
                              </div>
                         <input type="submit" name="submit" id="submit" value="Pay &#8358 200" class="btn btn-warning">
                         <input type="hidden" name="id" Value="<?php echo $_REQUEST['id'];?>">   
                               
                    </div>
                </div>
                
              </form>