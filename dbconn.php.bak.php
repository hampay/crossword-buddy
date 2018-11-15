<?php

$server = 'localhost';
$user = 'sonderen_cwbud';
$pass = 'Cr0ssW0rdD1ct10nary@';
$dbname = 'sonderen_dictionary_db';

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
	die("Connection failed" . $conn->connect_error);
}