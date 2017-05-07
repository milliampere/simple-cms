<?php 
		session_start();
    include 'includes/header.php';
		include 'database.php';
?>

<div class="container-fluid">
  <div class="row">
      <?php 
        if($_SESSION['loggedIn'] && $_SESSION['isAdmin']){
          //echo "<h1>You are logged in, " . $_SESSION['name'] . "</h1>";
          include 'includes/adminbar.php';
        }
        else if($_SESSION['loggedIn']) {
          //echo "<h1>You are logged in, " . $_SESSION['name'] . "</h1>";
          //include 'userBar.php';
        } else {
          echo "Wrong";
        }
      ?>


    <main class="col pt-3">
      <h1><?php echo "Hej " . $_SESSION['name'] ?> </h1>
    </main>


  </div> <!--End of row-->
</div> <!-- End of container -->




<?php 
    include 'includes/footer.php';
?>