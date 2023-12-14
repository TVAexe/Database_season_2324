<?php 
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", '123456789tp.');
    define("DATABASE", "grocery");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>
