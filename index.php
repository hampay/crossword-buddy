<?php

if (isset($_GET['controller']) && isset($_GET['action'])) {
	$controller = $_GET['controller'];
	$action = $_GET['action'];
} else {
	$controller = 'pages';
	$action = 'home';
}

    //calls layout.php
require_once('views/layout.php');

?>
