<?php 

function call($controller, $action) {
	require_once('controllers/' . $controller . '_controller.php');
	
	switch($controller) {
		case 'pages':
			$controller = new PagesController;
		break;
		case 'results':
			//require_once('models/solver.php');
			//require_once('models/definer.php');
			$controller = new ResultsController;
		break;
		case 'error':
			$controller = new ErrorController;
		break;
	}
	
	$controller->{ $action }();
	
}
$controllers = array(
	'pages' => array('home', 'not_found'),
	'results' => array('submit'),
	'error' => array('anagram_length', 'anagram_match', 'sql_error', 'no_match', 'timeout', 'file_missing', 'submission_length')
);
if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	} else {
		call('pages', 'not_found');
	}
} else {
	call('pages', 'not_found');
}