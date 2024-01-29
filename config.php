<?php

// Database configuration
$host = 'localhost'; // MySQL server host
$username = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'php_card_app'; // MySQL database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
