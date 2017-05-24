<?php
  session_start();
  include 'includes/header.php';
  include 'classes/Posts.php';
  include 'classes/User.php';
?>


<div class="container">
  <div class="row">
    <main class="col pt-3">
      <div id="content">
        <?php
          $posts = new Posts();
          $data = $posts->viewPosts();

          foreach ($data as $key) {
              include 'includes/post.php';
          }
        ?>
      </div>
    </main>
  </div>
</div>


<script>






</script>

<?php
  include 'includes/footer.php';
?> 







