<?php 

class Words
{
	
	//accepts a word submission
	//returns list of words, their part of speech, and definitions
	
	public static function find($submission) {	
		
		require_once('');
		
		$solver = new Solver;
		
		$results = $solver->findMatching($submission);
		
	}
}