<?php

$conn = new mysqli('localhost', 'root', '', 'adcash');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>