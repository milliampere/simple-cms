<?php
include 'includes/header.php';
?>
    <h1 class="text-center">Create post</h1>
    <form action="classes/post.php" method="post" class="createBlogpost"><br>
        <label>Title</label><br>
        <input type="text" name="postTitle" required="required"/><br><br>
        <label>Content</label>
        <textarea name="postContent" id="postContent" rows="10" class="form-control" required="required"></textarea><br>
        <input class="btn btn-primary" type="submit" value="Submit " name="submit"/>
    </form>
