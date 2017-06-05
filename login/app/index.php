<?php
include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <?php include('scripts.php') ?>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['current_user'])) { ?>
                    <li><p class="navbar-text">Signed in as <?php echo $_SESSION['current_user']; ?></p></li>
                    <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <h1>Welcome, <?php if (isset($current_user)) {
            echo $current_user;
        } ?>!</h1>
</div>
</body>
</html>
