<?php
session_start();

include 'classes/_Posts.php';
$posts = new _Posts();
$posts->viewPosts();

 
