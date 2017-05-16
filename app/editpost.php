<?php
    session_start();
    
    include 'classes/Verify.php';
    include 'classes/Database.php';
  
    // This is a secret page. To be included in all admin/user secret pages.
    Verify::secretPage();
    
    $postId = $_POST['postId']; 

    $pdo = Database::connection();
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :postId");
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();
    $post = $stmt->fetch();

?>

<?php
    include 'includes/header.php';
?>
<div class="container">
    <div class="row">
        <main class="col pt-3">
            <h1 class="text-center">Edit post</h1>
            <form action="classes/post.php" method="post" class="editBlogpost"><br>
                <label>Title</label><br>
                <input type="text" name="newTitle" required="required" value="<?php echo $post['title']; ?>"/><br><br>
                <label>Content</label>
                <textarea name="newContent" rows="10" class="form-control" required="required"><?php echo $post['content']; ?></textarea><br>
                <input type="hidden" name="postId" value="<?php echo $postId; ?>" />
                <input class="btn btn-primary" type="submit" value="Edit " name="edit"/>
            </form>
        </main>
    </div>
</div>
    
<?php 
    include 'includes/footer.php';
    
?>