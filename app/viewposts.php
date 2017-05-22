<?php
session_start();
  include 'includes/header.php';
?>

<?php
  include 'classes/Posts.php';
  $posts = new Posts();
  $posts->viewAllPosts();
?>

<?php
  include 'includes/footer.php';
?> 