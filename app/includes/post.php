<?php  
  $pdo = Database::connection();   
  $user = new User($pdo);    
  $title = $key['title'];
  $id = $key['userId'];
  $postId = $key['id']; 
  $content = $key['content'];
  $date = $key["date"];

  if(isset($_SESSION['loggedIn'])){
    $userId = $_SESSION["id"];
  }
?>

<div class="col-md-12">
  <h2> <?php echo $title ?> </h2>
  <p style="font-size:12px;font-style:italic" class="postedName">Posted by: <?php echo $user->getName($id);?>, <span class="label label-primary"> <?php echo $date ?></span><br></p>
  <p> <?php echo $content ?> </p>


  <div class="buttons">
  
    <div>

      <?php if(isset($_SESSION['loggedIn'])): ?>
        <form>
        <input type="hidden" name="postId" value="<?php echo $postId; ?>" />
        <input type="hidden" name="userId" value="<?php echo $userId; ?>" />
        <input type="button" name="likeButton" value="Like" class="likeButton likePost btn btn-primary btn-xs" id="likeButton" data-postid="<?php echo $postId; ?>" data-userid="<?php echo $userId; ?>" />
        </form>
      <?php endif; ?>
        <form>
        <input type="hidden" name="postId" value="<?php echo $postId; ?>" />
        <input type="hidden" name="likeCount" value="LikeCount" class="likeCount" id="like-<?php echo $postId; ?>" data-postid="<?php echo $postId; ?>" data-userid="<?php echo $userId; ?>" />
        <span class="likesCount"></span>
        </form>
    </div>

    <div>
      <?php if(isset($_SESSION['isAdmin']) || (isset($_SESSION['id']) && $id == $_SESSION['id']) ): ?>
        <form action="editpost.php" method="post" class="editButton">
        <input type="hidden" name="postId" value="<?php echo $postId?>" />
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="submit" value="Edit post" name="editpost" class="editPost btn btn-success btn-xs"></input>
        </form>

        <form action="classes/deletepost.php" method="post" class="deleteButton">
        <input type="hidden" name="postId" value="<?php echo $postId?>" />
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="submit" value="Delete post" name="deletepost" class="deletePost btn btn-danger btn-xs"></input>
        </form>
      <?php endif; ?>
    </div>
  </div>
  <hr>
</div>
