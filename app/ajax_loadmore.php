<?php
session_start();

include 'classes/_Posts.php';
include 'classes/User.php';
$posts = new _Posts();
$data = $posts->viewPosts();

foreach ($data as $key) {
    include 'includes/post.php';
}

 
