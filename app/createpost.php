<?php
    session_start();
    include 'includes/header.php';
?>
<div class="container">
  <div class="row">
    <main class="col pt-3">
        <h1 class="text-center">Create post</h1>
        <form action="classes/post.php" method="post" class="createBlogpost"><br>
            <label>Title</label><br>
            <input type="text" name="postTitle" required="required"/><br><br>
            <label>Content</label>
            <textarea name="postContent" rows="10" class="form-control" required="required"></textarea><br>
            <input class="btn btn-primary" type="submit" value="Submit " name="submit"/>
        </form>
    </main>
  </div>
</div>

<?php 
    include 'includes/footer.php';
    
?>


