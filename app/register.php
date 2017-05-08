<?php 
  include 'includes/header.php';  
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h3>Sign up</h3>
            <form class="form-horizontal" action="createuser.php" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
            </div>
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
                <label class="control-label col-sm-4" for="password">Confirm Password:</label>
                <div class="col-sm-10"> 
                <input type="password" class="form-control" name="password2" placeholder="Enter password">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="signup">Sign up!</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php 
  include 'includes/footer.php';
?>

