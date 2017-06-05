<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $entered_username = mysqli_real_escape_string($con, $_POST['username']);
    $entered_password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT username, password FROM users WHERE username = '$entered_username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $verified = password_verify($_POST['password'], $row['password']);

    if($verified) {
        $_SESSION['current_user'] = $row['username'];
        header("location: index.php");
    } else {
        $error='<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>your username or password is invalid!</div>';
    }
}
?>

<html>
<head>
    <title>Login</title>
    <?php include('scripts.php') ?>
</head>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<body >

<form class="form-horizontal" action="" method="POST">
    <fieldset>
        <div class="form-group">
            <label class="col-lg-2 control-label">Username</label>
            <div class="col-lg-4">
                <input type="text" name="username" placeholder="Username" autofocus="autofocus" required="required">
            </div>
        </div>
        <div class="form-group">
            <label for="userpw" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-4">
                <input type="password" name="password" placeholder="Password" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" value="login" class="btn btn-primary">Login</button>
            </div>
        </div>
    </fieldset>
</form>
<div class="col-lg-4"><?php if (isset($error)) {
        echo $error;
    } ?></div>

</body>
</html>
