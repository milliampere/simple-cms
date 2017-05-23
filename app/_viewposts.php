<?php
  session_start();
  include 'includes/header.php';
  include 'classes/_Posts.php';
?>


<div class="container">
  <div class="row">
    <main class="col pt-3">
      <div id="content">
        <?php
          $posts = new _Posts();
          $posts->viewPosts();
        ?>
      </div>
      <div>
        <button type="button" class="btn btn-primary btn-block active" id="moreButton" name="moreButton">Load more posts</button>   
      </div>
    </main>
  </div>
</div>


<?php
  include 'includes/footer.php';
?> 






