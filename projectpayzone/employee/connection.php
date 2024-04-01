<?php

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'payzone');

// Check connection
if (!$conn) {
    die("Could not connect to database: " . mysqli_connect_error());
}

?>
