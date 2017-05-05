<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>skapa post</h1>
    <form action="../classes/post.php" method="post">
        <label>Title</label>
        <input type="text" name="postTitle" required="required" placeholder="Title"/><br /><br />
        <label>Content :</label>
        <input type="textarea" name="postContent" required="required" placeholder="content"/><br/><br />
        <input type="submit" value=" Submit " name="submit"/><br />
    </form>
    <?php

    ?>
</body>
</html>