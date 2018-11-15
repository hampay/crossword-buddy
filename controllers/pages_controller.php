<?php

class PagesController

{
	
	public function home() {

		require_once('views/pages/home.php');

	}
	
	public function not_found() {

		require_once('views/pages/not_found.php');
		$this->home();

	}
	
}