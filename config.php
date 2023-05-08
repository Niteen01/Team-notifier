<?php

// MySQL connection settings
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'teamnotifierdb';

// Connect to MySQL database
$db = new mysqli($host, $username, $password, $database);
if ($db->connect_error) {
  die('Connection failed: ' . $db->connect_error);
}


?>