<?php
    include 'classes/Login.php';
    $login = new Login();
    Login::logincheck();

    if (!isset($_SESSION['loggedIn'])) { 
        header('Location: notloggedin.php'); 
    }

?>

<?php 
  include 'includes/header.php';
  
?>


<div class="container-fluid">
  <div class="row">
    <main class="col pt-3">
      <h3><?php echo "Hej!" ?> </h3>

      <?php

      include 'classes/Database.php';
      include 'classes/User.php';
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