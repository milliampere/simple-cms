<?php 
		session_start();
    include 'includes/header.php';
		include 'database.php';
?>

<div class="container">
  <div class="row">
    <div class="col" style="background-color: red">
      <?php 
        if($_SESSION['loggedIn'] && $_SESSION['isAdmin']){
          echo "<h1>You are logged in, " . $_SESSION['name'] . "</h1>";
          include 'includes/adminBar.php';
        }
        else if($_SESSION['loggedIn']) {
          echo "<h1>You are logged in, " . $_SESSION['name'] . "</h1>";
          //include 'userBar.php';
        } else {
          echo "Wrong";
        }
      ?>
    </div>
    <div class="col">
      Main
    </div>
  </div>
</div>




<?php 
    include 'includes/footer.php';
?>