<?php 
	session_start(); 
  include 'includes/header.php';

  include 'classes/Database.php';
  include 'classes/User.php';
?>

<?php 
  User::logincheck();
?>

<div class="container-fluid">
  <div class="row">
    <main class="col pt-3">
      <h3><?php echo "Hej " . $_SESSION['name'] ?> </h3>

      <?php


      $pdo = Database::connection();
      $user = new User($pdo);

      $id = $_SESSION['id'];
      echo "<br>";
      echo "Namn: " . $user->getName($id);
      echo "<br>";
      echo "Du har skrivit " . $user->numberOfPosts($id) . " inlägg.";

      ?>


    </main>
  </div> <!--end of row-->
</div> <!-- end of container -->


<?php 
    include 'includes/footer.php';
?>