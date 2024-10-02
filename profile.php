<?php 
session_start(); 
include "counter.php";
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
    form input{
      margin-bottom: 20px;
      padding: 16px 32px;
    }
  </style>
</head>
<body>
  <div class="contain">
    <?php include 'sidebar.php'; ?>

    <section class="main">
      <section class="main-course">
        <h1>My Profile</h1>
        <div class="course-box">
          <ul>
            <li class="active"><h1><?=$_SESSION['fname'].' '.$_SESSION['surname']?></h1></li>
          </ul>
         <div>
           <?php
            $db=mysqli_connect("localhost", "root", "", "movie_reservation_system");
            if (!$db) {
              echo "Not Connected to the Server";
              exit();
            }

            $sql = "SELECT * FROM users_tbl WHERE id =" . $_SESSION['id'] ."";
            $fetch = mysqli_query($db, $sql);
            
            while ($row = mysqli_fetch_assoc($fetch)) {
               $fname = $row['fname'];
               $lname = $row['surname'];
               $email = $row['email'];
             }

           ?>

           <form method="POST">
             <input type="text" name="fname" value="<?=$fname?>"><br>
             <input type="text" name="surname" value="<?=$lname?>"><br>
             <input type="email" name="email" value="<?=$email?>">
             <input type="submit" >
           </form>
         </div>

          </div>
        </div>
      </section>
    </section>
  </div>
</body>
</html></span>