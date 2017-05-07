<?php 
		session_start();
    include 'includes/header.php';
		include 'database.php';
?>

<?php 
  if($_SESSION['loggedIn'] && $_SESSION['isAdmin']){
    include 'includes/adminbar.php';
  }
  else if($_SESSION['loggedIn']) {
    //include 'userBar.php';
  } else {
    echo "Wrong";
  }
?>

<div class="container-fluid">
  <div class="row">
    <main class="col pt-3">
      <h3><?php echo "Hej " . $_SESSION['name'] ?> </h3>

      <?php
      include 'classes/User.php';
      $user = new User;
      $id = $_SESSION['id'];
      echo "<br>";
      echo "Namn: " . $user->getName($pdo, $id);
      echo "<br>";
      echo "Du har skrivit " . $user->numberOfPosts($pdo, $id) . " inlägg.";

      ?>


    </main>
  </div> <!--end of row-->
</div> <!-- end of container -->


<?php 
    include 'includes/footer.php';
?>