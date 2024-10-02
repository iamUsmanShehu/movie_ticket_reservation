<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-3 border-bottom shadow-sm" style="background-color:#007bff;">
    <h5 class="my-0 mr-md-auto font-weight-normal" style="color:white!important;font-weight: bold;">
        <a href="index.php"><img src="images/icon.png" style="width:100px !important;height: 70px;" /></a><b>OMTRS</b>
    </h5>

    <?php if (isset($_SESSION['fname'])):?>
        <nav class="my-2 my-md-0 mr-md-3">
          <font class="p-2 text-white badge badge-warning" href="index.php"><i class="fa fa-user"></i> <?php echo $_SESSION['fname']. ' ' . $_SESSION['surname']; ?></font>
        </nav>
        <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out"> leave</i></a>
    <?php endif;?>
    
    <?php if (!isset($_SESSION['fname'])):?>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="index.php">Home</a>
        <a class="p-2 text-white" href="admin/about.php">About</a>
        <a class="p-2 text-white" href="admin/gallery.php">Gallery</a>
    </nav>
    <a class="btn btn-outline-danger" href="admin/login.php"><i class="fa fa-lock"> Login</i></a>
    <?php endif;?>
</div>