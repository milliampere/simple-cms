<?php
session_start();
  include 'classes/Verify.php';
  // This is a secret page. To be included in all admin/user secret pages.
  Verify::secretPage();
?>

<?php 
  include 'includes/header.php';
?>

<?php
  include 'classes/Database.php';
  $pdo = Database::connection();
  include 'classes/User.php';
  $user = new User($pdo);
  $id = $_SESSION['id'];
?>

<div class="container-fluid">
  <div class="row">
    <main class="col pt-3">
      <h3><?php echo "Hej " . $user->getName($id); ?></h3>

      <?php
      echo "Email: " . $_SESSION['email'];
      echo "<br>";
      echo "Du har skrivit " . $user->numberOfPosts($id) . " inlägg.";
      echo "<br><br>";
      // echo "For testing only, to be removed:";
      // echo "<br>";
      // var_dump($_SESSION);

      ?>


    </main>
  </div> <!--end of row-->
</div> <!-- end of container -->


<?php 
    include 'includes/footer.php';
?>