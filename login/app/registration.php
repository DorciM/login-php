<?php
require('config.php');

$error = false;

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please enter a valid email";
    }

    $query = "INSERT INTO `users` (id, username, email, password) VALUES (null, '$username', '$email', '$hashed_password')";
    $result = mysqli_query($con, $query);

    if($result && !$error){
        $msg='<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>successful registration!</div>';
    }else{
        $msg='<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>user registration failed.</div>';
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <?php include('scripts.php') ?>
</head>

<body>
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
                <li><a href="login.php">Login</a></li>
                <li class="active"><a href="registration.php">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<form class="form-horizontal" action="" method="POST">
    <fieldset>
        <div class="form-group">
            <label class="col-lg-2 control-label">Username</label>
            <div class="col-lg-4">
                <input type="text" name="username" placeholder="Username" autofocus="autofocus" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-4">
                <input type="text" name="email" placeholder="Email" required="required">
                <span class="error"><?php if($error) echo $email_error; ?></span>
            </div>
        </div>
        <div class="form-group">
            <label for="userpw" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-4">
                <input type="password" name="password" id="userpw" placeholder="Password" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" value="login" class="btn btn-primary">Register</button>
            </div>
        </div>
    </fieldset>
</form>
<div class="col-lg-4" id="msg"><?php if (isset($msg)) {
        echo $msg;
    } ?></div>

</body>
</html>
