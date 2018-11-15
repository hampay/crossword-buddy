<?php

$server = 'localhost:8889';
$user = 'root';
$pass = 'root';
$dbname = 'wordnet_db';

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
	die("Connection failed" . $conn->connect_error);
}