<?php 

class ErrorController 
{
	
	public function anagram_length() {
		require_once('views/error/anagram_length.php');
		call('pages', 'home');
	}
	
	public function anagram_match() {
		require_once('views/error/anagram_match.php');
		call('pages', 'home');
	}
	
	public function sql_error() {
		require_once('views/error/sql_error.php');
		call('pages', 'home');
	}
	
	public function no_match() {
		require_once('views/error/no_match.php');
		call('pages', 'home');
	}
	
	public function timeout() {
		require_once('views/error/timeout.php');
		call('pages', 'home');
	}
	
	public function file_missing() {
		require_once('views/error/file_missing.php');
		call('pages', 'home');
	}
	
	public function submission_length() {
		require_once('views/error/submission_length.php');
		call('pages', 'home');
	}
	
}
