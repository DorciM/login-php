<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'login');

// connect to database
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$con){
    die("Connection refused : " . mysqli_error($con));
}

// create table if doesn't exist
$query = "SELECT 1 FROM users";
$result = mysqli_query($con, $query);
if(empty($result)) {
    $query = "CREATE TABLE users (
                              id int AUTO_INCREMENT,
                              username VARCHAR(255) NOT NULL,
                              email VARCHAR(255) NOT NULL,
                              password varchar(255) NOT NULL,
                              UNIQUE (username),
                              PRIMARY KEY (id)
                              )";
    $result = mysqli_query($con, $query);
}
?>
