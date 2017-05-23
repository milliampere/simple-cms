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
      <div>
        <!--<button type="button" class="btn btn-primary btn-block active" id="moreButton" name="moreButton">Load more posts</button>   
  -->    </div>
    </main>
  </div>
</div>


<script>

$(document).ready(function() {


  $('.likeButton').click(function(e) {

    $this = $(this);
    $postId = $this.attr('data-postid');
    $userId = $this.attr('data-userid');
    
    $.post("like_user.php", { postid: $postId, userid: $userId }, function(data){

      //Change to like/dislike
      if ($this.val() == "Like") {
        $this.val('Dislike');
      }
      else {
          $this.val('Like');
      }
      return false;

    });
    countLikes();
    
  }); 


  // Check if liked
  function checkIfLiked(){
    $(function() {

        $('.likeButton').each(function( index ) {
          var $this = $(this);
          $postId = $this.attr('data-postid');
          $userId = $this.attr('data-userid');

          $.post("like_check.php", { postid: $postId, userid: $userId }, function(data){
          $this.val(data);
          //$this.next().text(data);
          });

        });
      });
  }

checkIfLiked();

  // Show number of likes
  function countLikes(){
    $(function() {

        $('.likeCount').each(function( index ) {
          var $this = $(this);
          $postId = $this.attr('data-postid');
          $likeId = $this.attr('id');

          $.post("like_count.php", { postid: $postId, likeid: $likeId }, function(data){
          $this.val(data);
          $this.next().text(data);
          });

        });
      });
  }

countLikes();

}); // $(document).ready




</script>

<?php
  include 'includes/footer.php';
?> 







