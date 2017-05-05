<?php 
    session_start();

    include 'header.php';
    include '../error.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form class="form-horizontal" action="login.php" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10"> 
                <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


<?php

// Clear session array
$_SESSION = array();

// Check if user is logged in
if(isset($_SESSION['id'])){
    var_dump($_SESSION['id']);
} else {
    echo "You are not logged in.";
}

    
?>

<?php
    include 'footer.php';
?>