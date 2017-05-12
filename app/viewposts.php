<?php
session_start();
  include 'includes/header.php';
?>

<h1 class="text-center">All posts</h1>

<?php
  include 'classes/Posts.php';
  $posts = new Posts();
  $posts->viewAllPosts();
?>

<?php
  include 'includes/footer.php';
?> 