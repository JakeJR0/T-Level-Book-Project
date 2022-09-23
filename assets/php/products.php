<?php
# Connects to the XAMPP MySQL database

# Connect to MySQL server
$mysqli = new mysqli(HOST, USER, PASS, DB);

# Check for errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>